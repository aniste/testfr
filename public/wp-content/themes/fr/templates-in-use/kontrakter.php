<?php /* Template name: Kontrakter */ get_header(); ?>
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
					the_post();
					echo '<div class="ingressteksten">';
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
		<section class="hside kontrakter">
			<div class="siste">
				<div class="kontraktkategori">
					<?php
						$args = array(
						    'post_type' => 'kontrakt',
						    'posts_per_page' => 500,
						    'orderby' => 'menu_order',
				    		'order' => 'ASC',
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'kontraktkategori',
						          'field' => 'slug',
						          'terms' => 'hus'
						        )
						    )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						echo '<h2>Husleie</h2>';
						$presse_query = new WP_Query($args);

						while ($presse_query->have_posts()) : $presse_query->the_post();
						    // Echo some markup
						
						    echo '<div class="child kontrakt">';
						    	$importedID = $post->ID;
						    	// the_title();
						  		// echo $post->ID;
						  		
								$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo '<div class="date">' . $tag->name . '</div>';
								    }
								  }
								}
								
						    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '</a>';

						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
				</div>
				<div class="kontraktkategori">
					<?php
						$args = array(
						    'post_type' => 'kontrakt',
						    'posts_per_page' => 500,
						    'orderby' => 'menu_order',
				    		'order' => 'ASC',
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'kontraktkategori',
						          'field' => 'slug',
						          'terms' => 'eiendom'
						        )
						    )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						echo '<h2>Kjøp av fast eiendom</h2>';
						$presse_query = new WP_Query($args);

						while ($presse_query->have_posts()) : $presse_query->the_post();
						    // Echo some markup
						
						    echo '<div class="child kontrakt">';
						    	$importedID = $post->ID;
						    	// the_title();
						  		// echo $post->ID;
						  		
								$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo '<div class="date">' . $tag->name . '</div>';
								    }
								  }
								}
								
						    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '</a>';

						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
				</div>
				
				<div class="kontraktkategori">
					<?php
						$args = array(
						    'post_type' => 'kontrakt',
						    'posts_per_page' => 500,
						    'orderby' => 'menu_order',
				    		'order' => 'ASC',
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'kontraktkategori',
						          'field' => 'slug',
						          'terms' => 'handverkertjenester'
						        )
						    )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						echo '<h2>H&aring;ndverkertjenester</h2>';
						$presse_query = new WP_Query($args);

						while ($presse_query->have_posts()) : $presse_query->the_post();
						    // Echo some markup
						
						    echo '<div class="child kontrakt">';
						    	$importedID = $post->ID;
						    	$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo '<div class="date">' . $tag->name . '</div>';
								    }
								  }
								}
						  		// echo $post->ID;
						    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '</a>';

						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
				</div>
				
				<div class="kontraktkategori">
					<?php
						$args = array(
						    'post_type' => 'kontrakt',
						    'posts_per_page' => 500,
						    'orderby' => 'menu_order',
				    		'order' => 'ASC',
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'kontraktkategori',
						          'field' => 'slug',
						          'terms' => 'kjøretøy'
						        )
						    )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						echo '<h2>Kj&oslash;ret&oslash;y</h2>';
						$presse_query = new WP_Query($args);

						while ($presse_query->have_posts()) : $presse_query->the_post();
						    // Echo some markup
						
						    echo '<div class="child kontrakt">';
						    	$importedID = $post->ID;
						    	$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo '<div class="date">' . $tag->name . '</div>';
								    }
								  }
								}
						  		// echo $post->ID;
						    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '</a>';

						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
				</div>
				<div class="kontraktkategori">
					<?php
						$args = array(
						    'post_type' => 'kontrakt',
						    'posts_per_page' => 500,
						    'orderby' => 'menu_order',
				    		'order' => 'ASC',
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'kontraktkategori',
						          'field' => 'slug',
						          'terms' => 'båt'
						        )
						    )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						echo '<h2>B&aring;t</h2>';
						$presse_query = new WP_Query($args);

						while ($presse_query->have_posts()) : $presse_query->the_post();
						    // Echo some markup
						
						    echo '<div class="child kontrakt">';
						    	$importedID = $post->ID;
						    	$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo '<div class="date">' . $tag->name . '</div>';
								    }
								  }
								}
						  		// echo $post->ID;
						    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '</a>';

						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
				</div>
				<div class="kontraktkategori">
					<?php
						$args = array(
						    'post_type' => 'kontrakt',
						    'posts_per_page' => 500,
						    'orderby' => 'menu_order',
				    		'order' => 'ASC',
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'kontraktkategori',
						          'field' => 'slug',
						          'terms' => 'ting'
						        )
						    )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						echo '<h2>Ting</h2>';
						$presse_query = new WP_Query($args);

						while ($presse_query->have_posts()) : $presse_query->the_post();
						    // Echo some markup
						
						    echo '<div class="child kontrakt">';
						    	$importedID = $post->ID;
						    	$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo '<div class="date">' . $tag->name . '</div>';
								    }
								  }
								}
						  		// echo $post->ID;
						    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '</a>';

						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
				</div>
				<div class="kontraktkategori">
					<?php
						$args = array(
						    'post_type' => 'kontrakt',
						    'posts_per_page' => 500,
						    'orderby' => 'menu_order',
				    		'order' => 'ASC',
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'kontraktkategori',
						          'field' => 'slug',
						          'terms' => 'husdyr'
						        )
						    )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						echo '<h2>Husdyr</h2>';
						$presse_query = new WP_Query($args);

						while ($presse_query->have_posts()) : $presse_query->the_post();
						    // Echo some markup
						
						    echo '<div class="child kontrakt">';
						    	$importedID = $post->ID;
						    	$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo '<div class="date">' . $tag->name . '</div>';
								    }
								  }
								}
						  		// echo $post->ID;
						    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '</a>';

						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</section>
		<div class="clear"></div>
		<!-- /section -->
		</div>
		<?php get_footer(); ?>
	</main>
