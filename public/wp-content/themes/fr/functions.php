<?php

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination


if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 650, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'         => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'           => false,
    'default-text-color'        => '000',
    'width'             => 1000,
    'height'            => 198,
    'random-default'        => false,
    'wp-head-callback'      => $wphead_cb,
    'admin-head-callback'       => $adminhead_cb,
    'admin-preview-callback'    => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

/*------------------------------------*\
    Load Styles file
\*------------------------------------*/

function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

}

add_action( 'wp_enqueue_scripts', 'enqueue_theme_css' );

function enqueue_theme_css()
{



    wp_enqueue_style(
        'default',
        get_template_directory_uri() . '/styles/css/main.css', false, filemtime(get_stylesheet_directory() . '/styles/css/main.css')
    );

    wp_enqueue_style(
        'awesomefont',
        get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css'
    );

    wp_enqueue_style(
        'feedback-form-css',
        '/feedback-form/styles.css'
    );


    global $wp_styles;

    wp_enqueue_style( 'ie-rules', get_template_directory_uri() . '/styles/css/ie.css', array(), '1.0', 'all');
    $wp_styles->add_data( 'ie-rules', 'conditional', 'IE' );
}

/*------------------------------------*\
    Custom Functions
\*------------------------------------*/


// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Register menus

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Load HTML5 Blank scripts (header.php)
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        // wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        // wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('klageguide-scroll', get_template_directory_uri() . '/js/scroll.js', array('jquery'), '1.0.0', true); //Custom
        wp_enqueue_script('klageguide-scroll');

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!

        wp_register_script('table_script', get_template_directory_uri() . '/js/table.js', array('jquery'), '1.0.0', true); //Custom
        wp_enqueue_script('table_script');

        wp_register_script('link_script', get_template_directory_uri() . '/js/links.js', array('jquery'), '1.0.0', true); //Custom
        wp_enqueue_script('link_script');

        wp_register_script('menu_script', get_template_directory_uri() . '/js/menu.js', array('jquery'), '1.0.0,', true);
        wp_enqueue_script('menu_script');

        wp_register_script('search_script', get_template_directory_uri() . '/js/search.js', array('jquery'), '1.0.0', true); //Custom
        wp_enqueue_script('search_script');

        wp_register_script('mail-anti-spam', get_template_directory_uri() . '/js/jquery.email-antispam.js', array('jquery'), '1.0.0', true);
        // wp_enqueue_script('mail-anti-spam');
        

        wp_register_script('jquery', get_template_directory_uri() . '/js/lib/jquery-1.11.3.js', array(), '1.11.3');
        wp_enqueue_script('jquery');

        wp_register_script('hyphenate', get_template_directory_uri() . '/js/jquery.hypher.js', array(), '1.0.0');
        wp_enqueue_script('hyphenate');

        wp_register_script('nb-no', get_template_directory_uri() . '/js/nb-no.js', array(), '1.0.0');
        wp_enqueue_script('nb-no');

        wp_register_script('feedback-form-js', '/feedback-form/form.js', Array(), '1.0.0');
        wp_enqueue_script('feedback-form-js');

        wp_register_script('fbr', get_template_directory_uri() . '/js/fbr.js', array(), '1.0.0');
        wp_enqueue_script('fbr');
    }
}
function script_per_page_selector()
{
    if (has_template('single-klagebrev')) {
        // Conditional script(s)
        wp_register_script('get-action', get_template_directory_uri() . '/js/form-generate.js', array('jquery'), '1.0.0');
        wp_enqueue_script('get-action');
    }
}



/* Change menu item names in Admin */

function edit_admin_menu() {
    global $menu;
    global $submenu;

    $menu[5][0] = 'Innlegg';
    $submenu['edit.php'][5][0] ='Alle innlegg';
    $menu[20][0] = 'Faste sider';
}
add_Action( 'admin_menu', 'edit_admin_menu' );

// CUSTOMIZE ADMIN MENU ORDER
   function custom_menu_order($menu_ord) {
       if (!$menu_ord) return true;
       return array(
        'index.php', // this represents the dashboard link
        'edit.php?post_type=page', // this is the default page menu
        'edit.php', // this is the default POST admin menu 
        'edit.php?post_type=events', // this is a custom post type menu
        'edit-comments.php', // this is the comments menu,
        'upload.php', // this is media manager
        'edit.php?post_type=pressemelding',
    );
   }
   add_filter('custom_menu_order', 'custom_menu_order');
   add_filter('menu_order', 'custom_menu_order');





/*-----------------------------------------------------------------------------------*/
/*  Custom logos
/*-----------------------------------------------------------------------------------*/
function custom_admin_logo() {
    echo '
        <style type="text/css">
            #header-logo { background-image: url('.get_bloginfo('template_directory').'/img/fr-logo.png) !important; }
        </style>
    ';
}
add_action('admin_head', 'custom_admin_logo');

function custom_login_logo() {
    echo 
    '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/fr-logo.png) !important; background-size: contain!important; width: 186px!important;}
        #postexcerpt > div.inside > p {display: none;}
        


    </style>';
}

add_action('login_head', 'custom_login_logo');


/*-----------------------------------------------------------------------------------*/
/*  Categories and tags to pages
/*-----------------------------------------------------------------------------------*/

// Add tags and categories to pages
          
//Pages Tags &amp; Category Meta boxes
function add_pages_meta_boxes() {
add_meta_box(   'tagsdiv-post_tag', __('Page Tags'), 'post_tags_meta_box', 'page', 'side', 'low');
add_meta_box(   'categorydiv', __('Categories'), 'post_categories_meta_box', 'page', 'normal', 'core');
}
add_action('add_meta_boxes', 'add_pages_meta_boxes');
add_action('init','attach_category_to_page');

function attach_category_to_page() {
    register_taxonomy_for_object_type('category','page');
}
//end

//add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', 'My First Meta Box', 'cd_meta_box_cb', 'page', 'normal', 'high' );
}

   
function cd_meta_box_cb( $post )
{
$values = get_post_custom( $post->ID );
$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
$selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';
$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
    ?>

    <p>
        <label for="my_meta_box_select">Color</label>
        <select name="my_meta_box_select" id="my_meta_box_select">
            <option value="red" <?php selected( $selected, 'red' ); ?>>Red</option>
            <option value="blue" <?php selected( $selected, 'blue' ); ?>>Blue</option>
        </select>
    </p>
    <?php    
}

add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['my_meta_box_text'] ) )
        update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
         
    if( isset( $_POST['my_meta_box_select'] ) )
        update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
         
    // This is purely my personal preference for saving check-boxes
    $chk = isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_select'] ? 'on' : 'off';
    update_post_meta( $post_id, 'my_meta_box_check', $chk );
}


/*-----------------------------------------------------------------------------------*/
/*  Excerpt to pages
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/*-----------------------------------------------------------------------------------*/
/*  Excerpt length
/*-----------------------------------------------------------------------------------*/

function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );




//add_action('getattachment', 'wp_get_attachment');

function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}



/*Create custom post Merker*/
add_action( 'init', 'mitt_merke' );
function mitt_merke() {
    $labels = array(
        'name'               => _x( 'Merke', 'post type general name' ),
        'singular_name'      => _x( 'Merke', 'post type singular name' ),
        'add_new'            => _x( 'Lag nytt merke', 'merke' ),
        'add_new_item'       => __( 'Lag nytt merke' ),
        'edit_item'          => __( 'Rediger merke' ),
        'new_item'           => __( 'Nytt merke' ),
        'all_items'          => __( 'Alle merker' ),
        'view_item'          => __( 'Se merke' ),
        'search_items'       => __( 'Søk i merker' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Merker'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        'rewrite'        => array('slug' => 'merkeoversikten/%merkekategori%','with_front' => false),
        'query_var'        => true,
    );
    register_post_type( 'merke', $args );
}

/*Create custom taxonomy merkekategori to Merker*/
function my_taxonomies_product() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Product Categories' ),
        'all_items'         => __( 'Alle kategorier' ),
        'parent_item'       => __( 'Parent Product Category' ),
        'parent_item_colon' => __( 'Parent Product Category:' ),
        'edit_item'         => __( 'Edit Product Category' ),
        'update_item'       => __( 'Oppdater kategori' ),
        'add_new_item'      => __( 'Ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'merkekategori',
        'rewrite'        =>  array('slug' => 'merke' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'merkekategori', 'merke', $args );
}

add_action( 'init', 'my_taxonomies_product', 0 );

/*Rewrite the permalink to contain set merkekategori*/
add_filter('post_link', 'merkekategori_permalink', 1, 3);
add_filter('post_type_link', 'merkekategori_permalink', 1, 3);

function merkekategori_permalink($permalink, $post_id, $leavename) {
    //with %merkekategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%merkekategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'merkekategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-merkekategori';

    return str_replace('%merkekategori%', $taxonomy_slug, $permalink);
}



/* Create custom post Høringer*/
add_action( 'init', 'my_custom_post_horinger' );
function my_custom_post_horinger() {
    $labels = array(
        'name'               => _x( 'Høringer', 'post type general name' ),
        'singular_name'      => _x( 'Høringer', 'post type singular name' ),
        'add_new'            => _x( 'Lag ny høring', 'Høring' ),
        'add_new_item'       => __( 'Lag ny høring' ),
        'edit_item'          => __( 'Rediger høring' ),
        'new_item'           => __( 'Ny høring' ),
        'all_items'          => __( 'Alle høringer' ),
        'view_item'          => __( 'Se høringer' ),
        'search_items'       => __( 'Søk i høringer' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Høringer'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        //'rewrite'        => array('slug' => 'annet/tester-og-kjopetips/%testkategori%','with_front' => false),
        'query_var'        => true,
    );
    register_post_type( 'horinger', $args );
}

/*Create custom taxonomy kategori to høringer*/
function my_taxonomies_horinger() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'horingerkategori',
        'rewrite'        =>  array('slug' => 'horinger' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'horingerkategori', 'horinger', $args );
}

add_action( 'init', 'my_taxonomies_horinger', 0 );

/*Rewrite the permalink to contain set testkategori*/
add_filter('post_link', 'horinger_permalink', 1, 3);
add_filter('post_type_link', 'horinger_permalink', 1, 3);

function horinger_permalink($permalink, $post_id, $leavename) {
    //with %merkekategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%horingerkategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'horingerkategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-horingerkategori';

    return str_replace('%horingerkategori%', $taxonomy_slug, $permalink);
}

/* Create custom post Kontrakt*/
add_action( 'init', 'my_custom_post_kontrakt' );
function my_custom_post_kontrakt() {
    $labels = array(
        'name'               => _x( 'Kontrakt', 'post type general name' ),
        'singular_name'      => _x( 'Kontrakt', 'post type singular name' ),
        'add_new'            => _x( 'Ny kontrakt', 'Kontrakt' ),
        'add_new_item'       => __( 'Lag ny kontrakt' ),
        'edit_item'          => __( 'Rediger kontrakt' ),
        'new_item'           => __( 'Ny kontrakt' ),
        'all_items'          => __( 'Alle kontrakter' ),
        'view_item'          => __( 'Se kontrakt' ),
        'search_items'       => __( 'Søk i kontrakt' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Kontrakter'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        'rewrite'        => array('slug' => 'kontrakter/%kontraktkategori%','with_front' => false),
        'query_var'        => true,
        'taxonomies'    => array('post_tag'),
    );
    register_post_type( 'kontrakt', $args );
}

/*Create custom taxonomy kontraktkategori*/
function my_taxonomies_kontrakt() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'kontraktkategori',
        'rewrite'        =>  array('slug' => 'kontrakt' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'kontraktkategori', 'kontrakt', $args );
}

add_action( 'init', 'my_taxonomies_kontrakt', 0 );

/*Rewrite the permalink to contain set kontraktkategori*/
add_filter('post_link', 'kontrakt_permalink', 1, 3);
add_filter('post_type_link', 'kontrakt_permalink', 1, 3);

function kontrakt_permalink($permalink, $post_id, $leavename) {
    //with %kontraktkategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%kontraktkategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'kontraktkategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-kontraktkategori';

    return str_replace('%kontraktkategori%', $taxonomy_slug, $permalink);
}

/* Create custom post Klagebrev*/
add_action( 'init', 'my_custom_post_klagebrev' );
function my_custom_post_klagebrev() {
    $labels = array(
        'name'               => _x( 'Klagebrev', 'post type general name' ),
        'singular_name'      => _x( 'Klagebrev', 'post type singular name' ),
        'add_new'            => _x( 'New Klagebrev', 'Klagebrev' ),
        'add_new_item'       => __( 'Create new klagebrev' ),
        'edit_item'          => __( 'Edit klagebrev' ),
        'new_item'           => __( 'New klagebrev' ),
        'all_items'          => __( 'All klagebrev' ),
        'view_item'          => __( 'See klagebrev' ),
        'search_items'       => __( 'Search i klagebrev' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Klagebrev'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        'rewrite'        => array('slug' => 'klagebrev/%klagebrevkategori%','with_front' => false),
        'query_var'        => true,
        'taxonomies'    => array('post_tag'),
    );
    register_post_type( 'klagebrev', $args );
}

/*Create custom taxonomy klagebrevkategori*/
function my_taxonomies_klagebrev() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'klagebrevkategori',
        'rewrite'        =>  array('slug' => 'klagebrev' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'klagebrevkategori', 'klagebrev', $args );
}

add_action( 'init', 'my_taxonomies_klagebrev', 0 );

/*Rewrite the permalink to contain set klagebrevkategori*/
add_filter('post_link', 'klagebrev_permalink', 1, 3);
add_filter('post_type_link', 'klagebrev_permalink', 1, 3);

function klagebrev_permalink($permalink, $post_id, $leavename) {
    //with %kontraktkategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%klagebrevkategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'klagebrevkategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-klagebrevkategori';

    return str_replace('%klagebrevkategori%', $taxonomy_slug, $permalink);
}

/*Create custom post Tester*/
add_action( 'init', 'mine_tester' );
function mine_tester() {
    $labels = array(
        'name'               => _x( 'Test', 'post type general name' ),
        'singular_name'      => _x( 'Test', 'post type singular name' ),
        'add_new'            => _x( 'Lag ny test', 'test' ),
        'add_new_item'       => __( 'Lag ny test' ),
        'edit_item'          => __( 'Rediger test' ),
        'new_item'           => __( 'Ny test' ),
        'all_items'          => __( 'Alle tester' ),
        'view_item'          => __( 'Se tester' ),
        'search_items'       => __( 'Søk i tester' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Tester'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        'capability_type' => 'page',
        'rewrite'        => array('slug' => 'test/%testkategori%','with_front' => false),
        'query_var'        => true,
    );
    register_post_type( 'test', $args );
}

/*Create custom taxonomy merkekategori to Tester*/
function my_taxonomies_test() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'testkategori',
        'rewrite'        =>  array('slug' => 'test' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'testkategori', 'test', $args );
}

add_action( 'init', 'my_taxonomies_test', 0 );

/*Rewrite the permalink to contain set testkategori*/
add_filter('post_link', 'tester_permalink', 1, 3);
add_filter('post_type_link', 'tester_permalink', 1, 3);

function tester_permalink($permalink, $post_id, $leavename) {
    //with %merkekategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%testkategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'testkategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-testkategori';

    return str_replace('%testkategori%', $taxonomy_slug, $permalink);
}

/* Create custom post Guide*/
add_action( 'init', 'my_custom_post_guide' );
function my_custom_post_guide() {
    $labels = array(
        'name'               => _x( 'Guide', 'post type general name' ),
        'singular_name'      => _x( 'Guide', 'post type singular name' ),
        'add_new'            => _x( 'Lag ny guide', 'guide' ),
        'add_new_item'       => __( 'Lag ny guide' ),
        'edit_item'          => __( 'Rediger guide' ),
        'new_item'           => __( 'Ny guide' ),
        'all_items'          => __( 'Alle guider' ),
        'view_item'          => __( 'Se guide' ),
        'search_items'       => __( 'Søk i guider' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Guider'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        'rewrite'        => array('slug' => 'guide/%guidekategori%','with_front' => false),
        'query_var'        => true,
    );
    register_post_type( 'guide', $args );
}

/*Create custom taxonomy guidekategori to Guider*/
function my_taxonomies_guide() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'guidekategori',
        'rewrite'        =>  array('slug' => 'guide' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'guidekategori', 'guide', $args );
}


add_action( 'init', 'my_taxonomies_guide', 0 );

/*Rewrite the permalink to contain set guidekategori*/
add_filter('post_link', 'guide_permalink', 1, 3);
add_filter('post_type_link', 'guide_permalink', 1, 3);

function guide_permalink($permalink, $post_id, $leavename) {
    //with %pressemeldingategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%guidekategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'guidekategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-guidekategori';

    return str_replace('%guidekategori%', $taxonomy_slug, $permalink);
}


/* Create custom post Undersøkelser*/
add_action( 'init', 'my_custom_post_undersokelse' );
function my_custom_post_undersokelse() {
    $labels = array(
        'name'               => _x( 'Undersøkelse', 'post type general name' ),
        'singular_name'      => _x( 'Undersøkelse', 'post type singular name' ),
        'add_new'            => _x( 'Lag ny undersøkelse', 'undersøkelse' ),
        'add_new_item'       => __( 'Lag ny undersøkelse' ),
        'edit_item'          => __( 'Rediger undersøkelse' ),
        'new_item'           => __( 'Ny undersøkelse' ),
        'all_items'          => __( 'Alle undersøkelser' ),
        'view_item'          => __( 'Se undersøkelse' ),
        'search_items'       => __( 'Søk i undersøkelser' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Undersøkelser'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        'rewrite'        => array('slug' => 'undersokelse/%undersokelsekategori%','with_front' => false),
        'query_var'        => true,
    );
    register_post_type( 'undersokelse', $args );
}

/*Create custom taxonomy undersokelsekategori to undersokelser*/
function my_taxonomies_undersokelse() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'undersokelsekategori',
        'rewrite'        =>  array('slug' => 'undersokelse' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'undersokelsekategori', 'undersokelse', $args );
}


add_action( 'init', 'my_taxonomies_undersokelse', 0 );

/*Rewrite the permalink to contain set undersøkelsekategori*/
add_filter('post_link', 'undersokelse_permalink', 1, 3);
add_filter('post_type_link', 'undersokelse_permalink', 1, 3);

function undersokelse_permalink($permalink, $post_id, $leavename) {
    //with %pressemeldingategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%undersokelsekategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'undersokelsekategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-undersokelsekategori';

    return str_replace('%undersokelsekategori%', $taxonomy_slug, $permalink);
}



/* Create custom post Kjernesak*/
add_action( 'init', 'my_custom_post_kjernesak' );
function my_custom_post_kjernesak() {
    $labels = array(
        'name'               => _x( 'Kjernesak', 'post type general name' ),
        'singular_name'      => _x( 'Kjernesak', 'post type singular name' ),
        'add_new'            => _x( 'Lag ny kjernesak', 'Kjernesak' ),
        'add_new_item'       => __( 'Lag ny kjernesak' ),
        'edit_item'          => __( 'Rediger kjernesak' ),
        'new_item'           => __( 'Ny kjernesak' ),
        'all_items'          => __( 'Alle kjernesaker' ),
        'view_item'          => __( 'Se kjernesaker' ),
        'search_items'       => __( 'Søk i kjernesaker' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Kjernesak'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,
        'hierarchical'    => true,
        'rewrite'        => array('slug' => 'kjernesak/%kjernesakkategori%','with_front' => false),
        'query_var'        => true,
    );
    register_post_type( 'kjernesak', $args );
}

/*Create custom taxonomy kategori to kjernesak*/
function my_taxonomies_kjernesak() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'kjernesakkategori',
        'rewrite'        =>  array('slug' => 'kjernesak' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'kjernesakkategori', 'kjernesak', $args );
}

add_action( 'init', 'my_taxonomies_kjernesak', 0 );

/*Rewrite the permalink to contain set testkategori*/
add_filter('post_link', 'kjernesak_permalink', 1, 3);
add_filter('post_type_link', 'kjernesak_permalink', 1, 3);

function kjernesak_permalink($permalink, $post_id, $leavename) {
    //with %merkekategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%kjernesakkategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'kjernesakkategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-kjernesakkategori';

    return str_replace('%kjernesakkategori%', $taxonomy_slug, $permalink);
}


/* Create custom post Ansatt*/
add_action( 'init', 'my_custom_post_ansatt' );
function my_custom_post_ansatt() {
    $labels = array(
        'name'               => _x( 'Ansatt', 'post type general name' ),
        'singular_name'      => _x( 'Ansatt', 'post type singular name' ),
        'add_new'            => _x( 'Lag ny ansatt', 'ansatt' ),
        'add_new_item'       => __( 'Lag ny ansatt' ),
        'edit_item'          => __( 'Rediger ansatt' ),
        'new_item'           => __( 'Ny ansatt' ),
        'all_items'          => __( 'Alle ansatte' ),
        'view_item'          => __( 'Se ansatt' ),
        'search_items'       => __( 'Søk i ansatte' ),
        'not_found'          => __( 'Ingen funnet' ),
        'not_found_in_trash' => __( 'Ingen funnet i søppelkurv' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Ansatte'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail'),
        'has_archive'   => true,
        'hierarchical'    => true,
        'rewrite'        => array('slug' => 'ansatt/%ansattkategori%','with_front' => false),
        'query_var'        => true,
    );
    register_post_type( 'ansatt', $args );
}

/*Create custom taxonomy ansattkategori to ansatt*/
function my_taxonomies_ansatt() {
    $labels = array(
        'name'              => _x( 'Kategori', 'taxonomy general name' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
        'search_items'      => __( 'Søk i kategori' ),
        'all_items'         => __( 'Alle elementer i kategori' ),
        'parent_item'       => __( 'Foreldreelementer i kategori' ),
        'parent_item_colon' => __( 'Foreldreelement kategori:' ),
        'edit_item'         => __( 'Rediger kategori' ),
        'update_item'       => __( 'Oppdater foreldrekategori' ),
        'add_new_item'      => __( 'Lag ny kategori' ),
        'new_item_name'     => __( 'Ny kategori' ),
        'menu_name'         => __( 'Oversikt kategorier' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical'     => true,
        'public'        => true,
        'query_var'        => 'ansattkategori',
        'rewrite'        =>  array('slug' => 'ansatt' ),
        '_builtin'        => false,
    );
    register_taxonomy( 'ansattkategori', 'ansatt', $args );
}


add_action( 'init', 'my_taxonomies_ansatt', 0 );

/*Rewrite the permalink to contain set ansattkategori*/
add_filter('post_link', 'ansatt_permalink', 1, 3);
add_filter('post_type_link', 'ansatt_permalink', 1, 3);

function ansatt_permalink($permalink, $post_id, $leavename) {
    //with %pressemeldingategori% capture the rewrite of Custom Post Type
    if (strpos($permalink, '%ansattkategori%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'ansattkategori');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-ansattkategori';

    return str_replace('%ansattkategori%', $taxonomy_slug, $permalink);
}

 function the_breadcrumb_cust () {
     
    // Settings
    $separator  = '&gt;';
    $id         = 'breadcrumbs';
    $class      = 'breadcrumbs';
    $home_title = 'Forbrukerrådet';
     
    // Get the query & post information
    global $post,$wp_query;
    $category = get_the_category();
     
    // Build the breadcrums
    echo '<ul id="' . $id . '" class="' . $class . '">';
     
    // Do not display on the homepage
    if ( !is_front_page() ) {
         
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
         
        if ( is_single() ) {
             
            // Single post (Only display the first category)
            echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
            echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
            echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
             
        } else if ( is_category() ) {
             
            // Category page
            echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';
             
        } else if ( is_page() ) {
             
            // Standard page
            if( $post->post_parent ){
                 
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                 
                // Get parents in the right order
                $anc = array_reverse($anc);
                 
                // Parent page loop
                $parents = '';
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                 
                // Display parent pages
                echo $parents;
                 
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                 
            } else {
                 
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                 
            }
             
        } else if ( is_tag() ) {
             
            // Tag page
             
            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args ='include=' . $term_id;
            $terms = get_terms( $taxonomy, $args );
             
            // Display the tag name
            echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';
         
        } elseif ( is_day() ) {
             
            // Day archive
             
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
             
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
             
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
             
        } else if ( is_month() ) {
             
            // Month Archive
             
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
             
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
             
        } else if ( is_year() ) {
             
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
             
        } else if ( is_author() ) {
             
            // Auhor archive
             
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
             
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
         
        } else if ( get_query_var('paged') ) {
             
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
             
        } else if ( is_search() ) {
         
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
         
        } elseif ( is_404() ) {
             
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
         
    }
     
    echo '</ul>';
     
}

// Disabling all form submission save
// function example_disable_saving_subs( $save, $form_id ) {
//   // Set $save = false based on condition
//   return $save = false;
// }
//add_filter( 'ninja_forms_save_submission', 'example_disable_saving_subs', 2, 10 );





// Strips down default menu output. Removes classes added by WP.
function wp_nav_menu_attributes_filter($var) {
    return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'wp_nav_menu_attributes_filter', 100, 1);


function adminscripts() {
    if (!is_admin()) {
        wp_enqueue_script('custom_script', get_bloginfo('template_url').'/js/myScript.js', array('jquery'));
    }
    if(is_admin()){
        wp_enqueue_script('custom_admin_script', get_bloginfo('template_url').'/js/admin_script.js', array('jquery'));
        
    }   
}
add_action( 'admin_enqueue_scripts', 'adminscripts' );



// Flytter visual editor ned under custom field suite-bokser

function admin_footer_hook(){
    global $post;
    if ( get_post_type($post) == 'test') {
?>
    <script type="text/javascript">
        jQuery('#normal-sortables').insertBefore('#postdivrich');
    </script>
<?php
    }
}
// add_action('admin_footer','admin_footer_hook');
function admin_wysiwyg_page(){
    global $post;
    if ( get_post_type($post) == 'page') {
?>
    <script type="text/javascript">
        jQuery('#normal-sortables').insertBefore('#postdivrich');
    </script>
<?php
    }
}
// add_action('admin_footer','admin_footer_hook');


add_filter( 'gettext', 'wpse22764_gettext', 10, 2 );
function wpse22764_gettext( $translation, $original )
{
    if ( 'Excerpt' == $original ) {
        return 'Ingress til samleside';
    }else{
        $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
        if ($pos !== false) {
            return  'Dette er ingressteksten som hentes ut automatisk på samlesider hvor denne artikkelen vises.';
        }
    }
    return $translation;
}

/*
 * Modifying TinyMCE editor to remove unused items.
 */
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );
/*
 * Modify TinyMCE editor to remove H1.
 */
function tiny_mce_remove_unused_formats($init) {
    // Add block format elements you want to show in dropdown
    $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;';
    return $init;
}

/*-----------------------------------------------------------------------------------*/
/*  Custom shortcodes
/*-----------------------------------------------------------------------------------*/

function create_blackbutton( $atts, $content = null ) {
    return '<span class="black_button">' . $content . '</span>';
}
add_shortcode( 'svart-knapp', 'create_blackbutton' );

function create_greenbutton( $atts, $content = null ) {
    return '<span class="green_button">' . $content . '<div class="white-line"></div></span>';
}
add_shortcode( 'grønn-knapp', 'create_greenbutton' );

function create_bluebutton( $atts, $content = null ) {
    return '<span class="blue_button">' . $content . '</span>';
}
add_shortcode( 'blå-knapp', 'create_bluebutton' );

function create_whitebutton( $atts, $content = null ) {
    return '<span class="white_button">' . $content . '</span>';
}
add_shortcode( 'hvit-knapp', 'create_whitebutton' );

function create_whitebutton_oep( $atts, $content = null ) {
    return '<span class="white_button_oep"><i class="fa fa-external-link"></i>' . $content . '</span>';
}
add_shortcode( 'hvit-knapp-oep', 'create_whitebutton_oep' );

function create_threecolumn( $atts, $content = null ) {
    return '<div class="threecolumn">' . $content . '</div>';
}
add_shortcode( '3kolonne', 'create_threecolumn' );

function create_big_green_button( $atts, $content = null ) {
    return '<span class="green_button_white">' . $content . '</span>';
}
add_shortcode ( 'grønn-hvit',  'create_big_green_button');

function define_ingress( $atts, $content = null ) {
    return '<div class="ingress"><p>' . $content . '</p></div>';
}
add_shortcode ( 'ingress', 'define_ingress' );

function define_innledende( $atts, $content = null ) {
    return '<div class="innledende"><p>' . $content . '<p></div>';
}
add_shortcode ('innledende', 'define_innledende');





/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_merker');
function tsm_filter_post_type_by_taxonomy_merker() {
    global $typenow;
    $post_type = 'merke'; // change to your post type
    $taxonomy  = 'merkekategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_merke');
function tsm_convert_id_to_term_in_query_merke($query) {
    global $pagenow;
    $post_type = 'merke'; // change to your post type
    $taxonomy  = 'merkekategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_horinger');
function tsm_filter_post_type_by_taxonomy_horinger() {
    global $typenow;
    $post_type = 'horinger'; // change to your post type
    $taxonomy  = 'horingerkategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_horinger');
function tsm_convert_id_to_term_in_query_horinger($query) {
    global $pagenow;
    $post_type = 'horinger'; // change to your post type
    $taxonomy  = 'horingerkategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}



/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_test');
function tsm_filter_post_type_by_taxonomy_test() {
    global $typenow;
    $post_type = 'test'; // change to your post type
    $taxonomy  = 'testkategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_test');
function tsm_convert_id_to_term_in_query_test($query) {
    global $pagenow;
    $post_type = 'test'; // change to your post type
    $taxonomy  = 'testkategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_guide');
function tsm_filter_post_type_by_taxonomy_guide() {
    global $typenow;
    $post_type = 'guide'; // change to your post type
    $taxonomy  = 'guidekategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_guide');
function tsm_convert_id_to_term_in_query_guide($query) {
    global $pagenow;
    $post_type = 'guide'; // change to your post type
    $taxonomy  = 'guidekategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_undersokelse');
function tsm_filter_post_type_by_taxonomy_undersokelse() {
    global $typenow;
    $post_type = 'undersokelse'; // change to your post type
    $taxonomy  = 'undersokelsekategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_undersokelse');
function tsm_convert_id_to_term_in_query_undersokelse($query) {
    global $pagenow;
    $post_type = 'undersokelse'; // change to your post type
    $taxonomy  = 'undersokelsekategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_kontrakt');
function tsm_filter_post_type_by_taxonomy_kontrakt() {
    global $typenow;
    $post_type = 'kontrakt'; // change to your post type
    $taxonomy  = 'kontraktkategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_kontrakt');
function tsm_convert_id_to_term_in_query_kontrakt($query) {
    global $pagenow;
    $post_type = 'kontrakt'; // change to your post type
    $taxonomy  = 'kontraktkategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_klagebrev');
function tsm_filter_post_type_by_taxonomy_klagebrev() {
    global $typenow;
    $post_type = 'klagebrev'; // change to your post type
    $taxonomy  = 'klagebrevkategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_klagebrev');
function tsm_convert_id_to_term_in_query_klagebrev($query) {
    global $pagenow;
    $post_type = 'klagebrev'; // change to your post type
    $taxonomy  = 'klagebrevkategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_kjernesak');
function tsm_filter_post_type_by_taxonomy_kjernesak() {
    global $typenow;
    $post_type = 'kjernesak'; // change to your post type
    $taxonomy  = 'kjernesakkategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_kjernesak');
function tsm_convert_id_to_term_in_query_kjernesak($query) {
    global $pagenow;
    $post_type = 'kjernesak'; // change to your post type
    $taxonomy  = 'kjernesakkategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_ansatt');
function tsm_filter_post_type_by_taxonomy_ansatt() {
    global $typenow;
    $post_type = 'ansatt'; // change to your post type
    $taxonomy  = 'ansattkategori'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_ansatt');
function tsm_convert_id_to_term_in_query_ansatt($query) {
    global $pagenow;
    $post_type = 'ansatt'; // change to your post type
    $taxonomy  = 'ansattkategori'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}




/* Register template redirect action callback */
add_action('template_redirect', 'meks_remove_wp_archives');
 
/* Remove archives */
function meks_remove_wp_archives(){
  //If we are on category or tag or date or author archive
  if( is_category() || is_tag() || is_date() || is_author() ) {
    global $wp_query;
    $wp_query->set_404(); //set to 404 not found page
  }
}

function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function svg_size() {
  echo '<style>
    svg, img[src*=".svg"] {
      max-width: 150px !important;
      max-height: 150px !important;
    }
  </style>';
}
add_action('admin_head', 'svg_size');

function remove_comments_rss( $for_comments ) {
    return '';
}
add_filter('post_comments_feed_link_html','remove_comments_rss');

add_action('admin_head', 'content_textarea_height');
function content_textarea_height() {
    echo'
    <style type="text/css">
            .cfs_wysiwyg iframe{ height:500px; }
    </style>
    ';
}

    add_filter( 'oss_abort_index_document', 'oss_abort_index_document', 1, 4 );
    function oss_abort_index_document( $document, $index, $lang, $post ) {

        // Rules for klagebrev post types:
        if ( $post->post_type == 'klagebrev' ) {
            // Don't index meta pages for klagebrev forms
            if  ( strpos( $post->post_title, 'Dialect -' ) !== false ) {

                return true;
            }

            // Don't index klagebrev posts that does not contain a ninja form tag
            if ( strpos( $post->post_content, 'ninja_forms' ) === false ) {

                return true;
            }
        }

        return false;
    }

?>
