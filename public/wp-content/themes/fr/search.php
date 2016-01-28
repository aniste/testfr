<?php
/* global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
  $query_split = explode("=", $string);
  $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

 $search = new WP_Query($search_query);
?>
<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

      <h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

      <?php get_template_part('loop'); ?>

      <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
*/
