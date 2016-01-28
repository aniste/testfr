<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

        <div id="container-404">
          <img alt="404" src="<?php print get_template_directory_uri() . "/img/404.png" ?>" />
          <h1><?php _e( 'Siden finnes ikke', 'html5blank' ); ?></h1>
          <h2>
            Beklager, vi finner ikke siden du lette etter. Vil du tilbake? <a href="<?php echo home_url(); ?>"><?php _e( 'Klikk her', 'html5blank' ); ?></a>.
          </h2>
        </div>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
