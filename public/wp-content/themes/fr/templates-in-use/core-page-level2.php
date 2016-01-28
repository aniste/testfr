<?php /* Template name: Nivå 2 - Samleside*/ get_header(); ?>
	<div class="parent">
		<div class="headerimage"></div>
		<div class="frontpage-nav-wrapper">
		<?php

				if (has_post_thumbnail()) { //if a thumbnail has been set

				$imgID = get_post_thumbnail_id($post->ID); //get the id of the featured image
				$featuredImage = cl_wp_get_attachment_image_src($imgID, 'full' );//get the url of the featured image (returns an array)
				$imgURL = $featuredImage[0]; //get the url of the image out of the array

				?>
				<style type="text/css">
				    .headerimage {
				        background-image:url('<?php echo $imgURL ?>');
					}
			  </style>

			 <?php
			}//end if

			?>
			<?php if ( have_posts() ) {  /* Query and display the parent. */
			while ( have_posts() ) { ?>
				<div class="frontpage-nav-wrapper">
					<div class="topheader">
						<h1><?php the_title(); ?></h1>
						<h2>
						<?php
							$subheader = CFS()->get('subheader');
						    	if ($subheader != '') {echo $subheader;}
						?>
						</h2>
						<hr class="short-hr"/>
					</div>
				</div>
			<?php
				the_post();
				$thispage=$post->ID;
			}
		} ?>
		</div>
	</div>
	<div class="main-container p-0-20">
	<main role="main" class="contentfield">
		
		<div class="parent-content">
			<?php if ( have_posts() ) { 
				while ( have_posts() ) { ?>
				<?php
					the_post();
					echo '<div class="ingressteksten ingresscenter">';
					$ingressteksten = CFS()->get('ingress');
				    	if ($ingressteksten != '') {echo $ingressteksten;}
					echo '</div>';
					the_content();
					$thispage=$post->ID;
				}
			} 

			?>
		</div>
		<!-- section -->
		<section class="kjerneside-l-2">
		<div class="child-container">
			<!-- <section class="left"> -->
			<?php
			$args = array(
			    'post_type' => 'page',
			    'post_status' => 'publish',
			    'posts_per_page' => -1,
			    'post_parent' => $post->ID,
			    'orderby' => 'menu_order',
			    'order' => 'ASC',
			);
			$query = new WP_Query($args);
			while ($query->have_posts()) {
			    $query->the_post();
			    ?>
			    <div class="child">
			        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2 class="no-hyphenate"><?php the_title(); ?></h2>
				        <hr class="short-hr">
				        <div class="child-excerpt"><?php the_excerpt(); ?></div>
			        </a>
		        </div>
			    <?php
			    
			}
			wp_reset_postdata();
			?>
		</div>
			<div class="clear"></div>
			<!-- </section> -->
				
		</section>
		<!-- /section -->
		
	</main>
	</div>
	</div>
<?php get_footer(); ?>
