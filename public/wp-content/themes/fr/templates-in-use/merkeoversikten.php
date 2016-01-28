<?php /* Template name: Merkeoversikten */ get_header(); ?>
	<main role="main" class="contentfield">
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
						<h3><p>
						<?php
							$subheader = CFS()->get('subheader');
						    	if ($subheader != '') {echo $subheader;}
						?>
						</p></h3>
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
		<div class="parent-content">
		
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<?php
					echo '<div class="ingressteksten">';
					$ingressteksten = CFS()->get('ingress');
				    	if ($ingressteksten != '') {echo $ingressteksten;}
					echo '</div>';
					the_post();
					the_content();
					$thispage=$post->ID;
				}
			}
			?>
		</div>
		
		
	</main>
	<div class="category">
		<div class="head-container"><h4 class="head p-0-20">Helse</h4></div>
		<div class="main p-0-20">
			<section class="merke">
				<div class="archive_drop">
					<div class="category-container">
						<?php
							$args = array(
							    'post_type' => 'merke',
							    'posts_per_page' => 500,
							    'orderby' => 'menu_order',
								'order'   => 'ASC',
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'merkekategori',
							          'field' => 'slug',
							          'terms' => 'helse'
							        )
							    )
							);
							$hsvar_query = new WP_Query($args);

							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
							    echo '<div class="child">';
							    	$importedID = $post->ID;?>
							    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							  		<?php the_post_thumbnail( array( 1000, 315), array( 'class' => 'merke-image' ) );
						    		echo '<h5>' . $post->post_title . '</h5>';
						    		echo '</a>';
					   			echo '</div>';
							    
							endwhile;
							wp_reset_postdata();
						?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</section>
		</div>
	</div>
	<div class="category">
		<div class="head-container"><h4 class="head p-0-20">Milj&oslash;</h4></div>
		<div class="main p-0-20">
			<section class="merke">
				<div class="archive_drop">
					<div>
						<?php
							$args = array(
							    'post_type' => 'merke',
							    'posts_per_page' => 500,
							    'orderby' => 'menu_order',
								'order'   => 'ASC',
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'merkekategori',
							          'field' => 'slug',
							          'terms' => 'miljo'
							        )
							    )
							);
							$hsvar_query = new WP_Query($args);

							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
							    echo '<div class="child">';
							    	$importedID = $post->ID;?>
							  		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							  		<?php the_post_thumbnail( array( 1000, 315), array( 'class' => 'merke-image' ) );
						    		echo '<h5>' . $post->post_title . '</h5>';
						    		echo '</a>';
					   			echo '</div>';
							    
							endwhile;
							wp_reset_postdata();
						?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</section>
		</div>
	</div>
	<div class="category">
		<div class="head-container"><h4 class="head p-0-20">Mat</h4></div>
		<div class="main p-0-20">
			<section class="merke">
				<div class="archive_drop">
					<div>
						<?php
							$args = array(
							    'post_type' => 'merke',
							    'posts_per_page' => 500,
							    'orderby' => 'menu_order',
								'order'   => 'ASC',
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'merkekategori',
							          'field' => 'slug',
							          'terms' => 'mat'
							        )
							    )
							);
							$hsvar_query = new WP_Query($args);

							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
							    echo '<div class="child">';
							    	$importedID = $post->ID;?>
							  		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							  		<?php the_post_thumbnail( array( 1000, 315), array( 'class' => 'merke-image' ) );
						    		echo '<h5>' . $post->post_title . '</h5>';
						    		echo '</a>';
					   			echo '</div>';
							    
							endwhile;
							wp_reset_postdata();
						?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</section>
		</div>
	</div>
	<div class="category">
		<div class="head-container"><h4 class="head p-0-20">Etikk</h4></div>
		<div class="main p-0-20">
			<section class="merke">
				<div class="archive_drop">
					<div>
						<?php
							$args = array(
							    'post_type' => 'merke',
							    'posts_per_page' => 500,
							    'orderby' => 'menu_order',
								'order'   => 'ASC',
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'merkekategori',
							          'field' => 'slug',
							          'terms' => 'etikk'
							        )
							    )
							);
							$hsvar_query = new WP_Query($args);

							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
							    echo '<div class="child">';
							    	$importedID = $post->ID;?>
							  		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							  		<?php the_post_thumbnail( array( 1000, 315), array( 'class' => 'merke-image' ) );
						    		echo '<h5>' . $post->post_title . '</h5>';
						    		echo '</a>';
					   			echo '</div>';
							    
							endwhile;
							wp_reset_postdata();
						?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</section>
		</div>
	</div>
	<div class="category">
		<div class="head-container"><h4 class="head p-0-20">Andre</h4></div>
		<div class="main p-0-20">
			<section class="merke">
				<div class="archive_drop">
					<div>
						<?php
							$args = array(
							    'post_type' => 'merke',
							    'posts_per_page' => 500,
							    'orderby' => 'menu_order',
								'order'   => 'ASC',
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'merkekategori',
							          'field' => 'slug',
							          'terms' => 'andre'
							        )
							    )
							);
							$hsvar_query = new WP_Query($args);

							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
							    echo '<div class="child">';
							    	$importedID = $post->ID;?>
							  		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							  		<?php the_post_thumbnail( array( 1000, 315), array( 'class' => 'merke-image' ) );
						    		echo '<h5>' . $post->post_title . '</h5>';
						    		echo '</a>';
					   			echo '</div>';
							    
							endwhile;
							wp_reset_postdata();
						?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</section>
		</div>
	</div></div>
<?php get_footer(); ?>
