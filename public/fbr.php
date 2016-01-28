<?php

///////////////////////////////////////////////////////////////////////////////
// issue163406 - PERMALINK REWRITE: one post - multiple permalinks
///////////////////////////////////////////////////////////////////////////////

/**
 * Call this function in the templates whenever get_permalink() is used.
 * This function will prefix the permalink with correct category
 */
function rewrite_post_parmalink($original) {
  $parts = parse_url($original);
  $oparts = explode('/', preg_replace('/\/$/', '', $parts['path']));
  $slug = end($oparts);

  $prefix = preg_replace('/\/$/', '', $_SERVER["REQUEST_URI"]);
  return "//{$parts['host']}{$prefix}/{$slug}";
}

/**
 * Test if given slug(s) match any of the mapped templates
 */
function prefix_url_rewrite_test($tests) {
  //'/templates-in-use/'.
  $map = Array(
    'forside/fpa-bolig'                          => '/single-fpa_mening.php',
    'forside/fpa-finans'                         => '/single-fpa_mening.php',
    'forside/fpa-mat-produktsikkerhet-og-handel' => '/single-fpa_mening.php',
    'forside/fpa-digital'                        => '/single-fpa_mening.php',
    'forside/fpa-offentlig-og-helse'             => '/single-fpa_mening.php',

    'forside/nytt-og-nyttig'                     => '/single-fpa_nytt.php',
    'presse'                                     => '/single-fpa_presse.php'
  );

  foreach ( $tests as $test ) {
    if ( isset($map[$test]) && ($tpl = $map[$test]) ) {
      return $tpl;
    }
  }

  return false;
}

/**
 * If the slug(s) matches a template map and the "real permalink" is matching
 * one of the ones defined below, we return a template to override WP
 */
function prefix_url_rewrite_get($bits, $rbits) {
  $tests = Array($bits[1]);
  if ( isset($bits[2]) ) {
    $tests[] = "{$bits[1]}/{$bits[2]}";
  }
  $rmaps = Array('pressemelding', 'pressemeldinger', 'vi-mener', 'nytt-og-nyttig');

  if ( $tpl = prefix_url_rewrite_test($tests) ) {
    if ( in_array($rbits[1], $rmaps) ) {
      return $tpl;
    }
  }

  return false;
}

/**
 * This function gets called every time WP tries to load a permalink.
 */
function prefix_url_rewrite_templates() {
  $bits = explode('/', $_SERVER["REQUEST_URI"]);
  if ( isset($bits[1]) ) {
    $rbits = explode('/', parse_url(get_permalink(), PHP_URL_PATH)); // The "real" page
    if ( $template = prefix_url_rewrite_get($bits, $rbits) ) {
      add_filter( 'template_include', function () use($template) {
        return get_template_directory() . $template;
      });
    }
  }
}

if ( !is_admin() )
{
  // We have to remove the internal WP redirect to make this all work
  remove_filter('template_redirect', 'redirect_canonical');

  // Then add the action that does the magick
  add_action( 'template_redirect', 'prefix_url_rewrite_templates' );
}

///////////////////////////////////////////////////////////////////////////////
// issue162894 - PERFORMANCE: Optimize Wordpress
///////////////////////////////////////////////////////////////////////////////

/**
 * Modifies what scripts/styles are included in template output
 * Used for concatenation (optimization)
 */
function modify_included_refs() {
  global $wp_styles;
  global $wp_scripts;

  // Remove registered
  $unregister = Array(
    'script' => Array(
      'jquery-core',
      'jquery-migrate',
      'modernizr',
      'hyphenate',
      'nb-no',
      'minified.javascript',
      'klageguide-scroll',
      'html5blankscripts',
      'table_script',
      'link_script',
      'menu_script',
      'search_script',
      'feedback-form-js',
      'fbr',

      'opensearchserver'
    ),
    'style' => Array(
      'minified.stylesheet',
      'default',
      'ie-rules',
      'awesomefont',
      'feedback-form-css',

      'opensearchserver-style'
    )
  );

  foreach ( $unregister as $fn => $i ) {
    call_user_func_array("wp_dequeue_$fn", Array($i));
    call_user_func_array("wp_deregister_$fn", Array($i));
  }


  // Add new
  wp_enqueue_script('minified.javascript', get_template_directory_uri() . '/assets/main.min.js', Array(), '', true);
  wp_enqueue_style('minified.stylesheet', get_template_directory_uri() . '/assets/main.min.css');
  wp_enqueue_style( 'ie-rules', get_template_directory_uri() . '/styles/css/ie.css', array(), '1.0', 'all');
  $wp_styles->add_data( 'ie-rules', 'conditional', 'IE' );
}

if ( !is_admin() && defined('FBRWEB_ENV') && FBRWEB_ENV == 'prod' ) {
  add_action( 'wp_enqueue_scripts', 'modify_included_refs', 20 );
}

///////////////////////////////////////////////////////////////////////////////
// issue163875 - PDF FORMS GENERATOR: Ninjaforms causes pages that don't use Ninjaforms to run slowly
///////////////////////////////////////////////////////////////////////////////

function check_if_nf_is_required() {
  if ( $GLOBALS['pagenow'] == 'wp-login.php' || is_admin() ) {
    return true;
  }

  if ( preg_match('/klagebrev\/(.*)$/', $_SERVER['REQUEST_URI'], $m) > 0 ) {
    if ( isset($m[1]) && strlen($m[1]) ) {
      return true;
    }
  }
  return false;
}

///////////////////////////////////////////////////////////////////////////////
// issue163902 - TEMPLATES: Remove images from "enkeltpressemelding"
///////////////////////////////////////////////////////////////////////////////

function the_content_without_images() {

  $innerHTML = "XX";
  $html = "";

  // Buffer the HTML
  ob_start();
  the_content();
  $html = ob_get_contents();
  ob_end_clean();

  // Manipulate DOM
  $doc = new DOMDocument();
  $doc->loadHTML($html);
  $doc->encoding = 'UTF-8';

  $xpath = new DOMXPath( $doc );
  $childs = $xpath->query(".//div");
  foreach ( $childs as $node ) {
    if ( $node->getElementsByTagName("img")->length ) {
      $node->parentNode->removeChild($node);
    }
  }

  // Return only the body contents of DOM
  return utf8_decode($doc->saveHTML($doc->getElementsByTagName("body")->item(0)));
}

///////////////////////////////////////////////////////////////////////////////
// issue163878 - PERFORMANCE: Separate domain for static resources
///////////////////////////////////////////////////////////////////////////////

/**
 * This is the global wrapper for getting image src
 */
function cl_wp_get_attachment_image_src($id, $type) {
  $url = wp_get_attachment_image_src($id, $type);
  if ( defined('FBRWEB_OFFLOAD_HOST') && ($rep = constant('FBRWEB_OFFLOAD_HOST')) ) {
    return str_replace( '//' . $_SERVER['HTTP_HOST'], '//' . $rep, $url);
  }
  return $url;
}

/**
 * This will replace the attachment URL in internal function calls
 */
function cl_wp_get_attachment_url($url) {
  if ( defined('FBRWEB_OFFLOAD_HOST') && ($rep = constant('FBRWEB_OFFLOAD_HOST')) ) {
    return str_replace( '//' . $_SERVER['HTTP_HOST'], '//' . $rep, $url);
  }
  return $url;
}
add_filter('wp_get_attachment_url', 'cl_wp_get_attachment_url');
