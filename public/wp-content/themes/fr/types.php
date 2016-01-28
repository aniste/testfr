<?php /* Template name: Pressemeldinger */ get_header(); ?>
		<main role="main">
		<!-- section -->

		<section class="section group">
		<?php 
			$args = array( 
				'post_type' => 'pressemelding', 
				'showposts'=>'62', 
				'category_name' => '2015');

			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
						<div class="item col span_1_of_2">
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

							<!-- post thumbnail -->
							<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(); // Fullsize image for the single post ?>
								</a>
							<?php endif; ?>
							<!-- /post thumbnail -->

							<!-- post details --> 
							<div class="meta-info"> 
								<span class="date"><?php the_time('j F, Y'); ?> <?php the_time('g:i a'); ?></span>
								<span class="author"><?php _e( 'Skrevet av', 'getposts' ); ?> <?php the_author_posts_link(); ?></span>
							<!-- /post details -->
							</div>
							<div class="ingresstekst">
								<?php echo types_render_field("ingresstekst", array('raw' => 'true')); ?>
							</div>
						</div>


			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<div class="clear"></div>
		</section>

		<!-- /section -->

	</main>
<?php get_footer(); ?>
