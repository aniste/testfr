<?php /* Template name: Tester */ get_header(); ?>
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
					<h3><p>
					<?php
						$subheader = CFS()->get('subheader');
					    	if ($subheader != '') {echo $subheader;}
					?>
					</p></h3>
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
		<section class="test">
			<div class="siste">

				<?php
					$args = array(
					    'post_type' => array( 'test', 'undersokelse', 'guide' ),
					    'posts_per_page' => 9,
					    'tax_query' => array(
										    'relation' => 'OR',
										    array(
										        'taxonomy' => 'testkategori',
										        'field'    => 'slug',
										        'terms'    => '2015',
										    ),
										    array(
										        'taxonomy' => 'guidekategori',
										        'field'    => 'slug',
										        'terms'    => '2015',
										    ),
										    array(
										        'taxonomy' => 'undersokelsekategori',
										        'field'    => 'slug',
										        'terms'    => '2015',
										    ),
										),
					);

					$hsvar_query = new WP_Query($args);

					while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
					    echo '<div class="child">';
					    echo '<a href="' . get_permalink() .'">';
					    	echo '<div class="article-image">';
					    	$importedID = $post->ID;
					    
					  		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
					    	 echo '<h3>' . $post->post_title . '</h3></a>';
					    	echo '<p>' . $post->post_excerpt . '</p>';
					    	$vedlegg = CFS()->get('vedlegg');
					    	if ($vedlegg != '') {
					    		foreach ($vedlegg as $infotekst) {
					    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
					    		}
					    	}
					    echo '</div>'; 
					    
					endwhile;
					wp_reset_postdata();
				?>
				<div class="clear"></div>
			</div>
			<div class="archived">
				<h5>Arkiv tester, unders&oslash;kelser og guider</h5>
				<br />
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2015</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt"> 
				    		<?php
							$args = array(
							    'post_type' => array( 'test', 'undersokelse', 'guide' ),
							    'posts_per_page' => 500,
							    'offset' => 9,
							    'tax_query' => array(
												    'relation' => 'OR',
												    array(
												        'taxonomy' => 'testkategori',
												        'field'    => 'slug',
												        'terms'    => '2015',
												    ),
												    array(
												        'taxonomy' => 'guidekategori',
												        'field'    => 'slug',
												        'terms'    => '2015',
												    ),
												    array(
												        'taxonomy' => 'undersokelsekategori',
												        'field'    => 'slug',
												        'terms'    => '2015',
												    ),
												),
							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	echo '<div class="article-image">';
							    	$importedID = $post->ID;

							   		
							    	the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
							    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
							    	echo '<p>' . $post->post_excerpt . '</p>';
							    	$vedlegg = CFS()->get('vedlegg');
							    	if ($vedlegg != '') {
							    		foreach ($vedlegg as $infotekst) {

							    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
							    		}
							    	}
							    echo '</div>'; 
							    
							endwhile;
							wp_reset_postdata();
						?>
				    	</div>
					</div>
				</div>
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2014</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt"> 
				    		<?php
							$args = array(
							    'post_type' => array( 'test', 'undersokelse', 'guide' ),
							    'posts_per_page' => 500,
							    'tax_query' => array(
												    'relation' => 'OR',
												    array(
												        'taxonomy' => 'testkategori',
												        'field'    => 'slug',
												        'terms'    => '2014',
												    ),
												    array(
												        'taxonomy' => 'guidekategori',
												        'field'    => 'slug',
												        'terms'    => '2014',
												    ),
												    array(
												        'taxonomy' => 'undersokelsekategori',
												        'field'    => 'slug',
												        'terms'    => '2014',
												    ),
												),
							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	echo '<div class="article-image">';
							    	$importedID = $post->ID;

							   		
							    	the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
							    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
							    	echo '<p>' . $post->post_excerpt . '</p>';
							    	$vedlegg = CFS()->get('vedlegg');
							    	if ($vedlegg != '') {
							    		foreach ($vedlegg as $infotekst) {

							    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
							    		}
							    	}
							    echo '</div>'; 
							    
							endwhile;
							wp_reset_postdata();
						?>
				    	</div>
					</div>
				</div>
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2013</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt"> 
				    		<?php
							$args = array(
							    'post_type' => array( 'test', 'undersokelse', 'guide' ),
							    'posts_per_page' => 500,
							    'tax_query' => array(
												    'relation' => 'OR',
												    array(
												        'taxonomy' => 'testkategori',
												        'field'    => 'slug',
												        'terms'    => '2013',
												    ),
												    array(
												        'taxonomy' => 'guidekategori',
												        'field'    => 'slug',
												        'terms'    => '2013',
												    ),
												    array(
												        'taxonomy' => 'undersokelsekategori',
												        'field'    => 'slug',
												        'terms'    => '2013',
												    ),
												),
							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	echo '<div class="article-image">';
							    	$importedID = $post->ID;

							   		
							    	the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
							    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
							    	echo '<p>' . $post->post_excerpt . '</p>';
							    	$vedlegg = CFS()->get('vedlegg');
							    	if ($vedlegg != '') {
							    		foreach ($vedlegg as $infotekst) {

							    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
							    		}
							    	}
							    echo '</div>'; 
							    
							endwhile;
							wp_reset_postdata();
						?>
				    	</div>
					</div>
				</div>

				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2012</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt"> 
				    		<?php
							$args = array(
							    'post_type' => array( 'test', 'undersokelse', 'guide' ),
							    'posts_per_page' => 500,
							    'tax_query' => array(
												    'relation' => 'OR',
												    array(
												        'taxonomy' => 'testkategori',
												        'field'    => 'slug',
												        'terms'    => '2012',
												    ),
												    array(
												        'taxonomy' => 'guidekategori',
												        'field'    => 'slug',
												        'terms'    => '2012',
												    ),
												    array(
												        'taxonomy' => 'undersokelsekategori',
												        'field'    => 'slug',
												        'terms'    => '2012',
												    ),
												),
							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	echo '<div class="article-image">';
							    	$importedID = $post->ID;

							   		
							    	the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
							    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
							    	echo '<p>' . $post->post_excerpt . '</p>';
							    	$vedlegg = CFS()->get('vedlegg');
							    	if ($vedlegg != '') {
							    		foreach ($vedlegg as $infotekst) {

							    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
							    		}
							    	}
							    echo '</div>'; 
							    
							endwhile;
							wp_reset_postdata();
						?>
				    	</div>
					</div>
				</div>
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2011</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt"> 
				    		<?php
							$args = array(
							    'post_type' => array( 'test', 'undersokelse', 'guide' ),
							    'posts_per_page' => 500,
							    'tax_query' => array(
												    'relation' => 'OR',
												    array(
												        'taxonomy' => 'testkategori',
												        'field'    => 'slug',
												        'terms'    => '2011',
												    ),
												    array(
												        'taxonomy' => 'guidekategori',
												        'field'    => 'slug',
												        'terms'    => '2011',
												    ),
												    array(
												        'taxonomy' => 'undersokelsekategori',
												        'field'    => 'slug',
												        'terms'    => '2011',
												    ),
												),
							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	echo '<div class="article-image">';
							    	$importedID = $post->ID;

							   		
							    	the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
							    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
							    	echo '<p>' . $post->post_excerpt . '</p>';
							    	$vedlegg = CFS()->get('vedlegg');
							    	if ($vedlegg != '') {
							    		foreach ($vedlegg as $infotekst) {

							    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
							    		}
							    	}
							    echo '</div>'; 
							    
							endwhile;
							wp_reset_postdata();
						?>
				    	</div>
					</div>
				</div>
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2010</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt"> 
				    		<?php
							$args = array(
							    'post_type' => array( 'test', 'undersokelse', 'guide' ),
							    'posts_per_page' => 500,
							    'tax_query' => array(
												    'relation' => 'OR',
												    array(
												        'taxonomy' => 'testkategori',
												        'field'    => 'slug',
												        'terms'    => '2010',
												    ),
												    array(
												        'taxonomy' => 'guidekategori',
												        'field'    => 'slug',
												        'terms'    => '2010',
												    ),
												    array(
												        'taxonomy' => 'undersokelsekategori',
												        'field'    => 'slug',
												        'terms'    => '2010',
												    ),
												),
							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	echo '<div class="article-image">';
							    	$importedID = $post->ID;

							   		
							    	the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
							    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
							    	echo '<p>' . $post->post_excerpt . '</p>';
							    	$vedlegg = CFS()->get('vedlegg');
							    	if ($vedlegg != '') {
							    		foreach ($vedlegg as $infotekst) {

							    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
							    		}
							    	}
							    echo '</div>'; 
							    
							endwhile;
							wp_reset_postdata();
						?>
				    	</div>
					</div>
				</div>

			</div>
			<div class="clear"></div>
		</section>
		<div class="clear"></div>
		<!-- /section -->
		</div>
		<?php get_footer(); ?>
	</main>
