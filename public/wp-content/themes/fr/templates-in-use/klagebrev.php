<?php /* Template name: Klagebrev */ get_header(); ?>
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
					$thispage=$post->ID;
				}
			}
			?>
		</div>
		<!-- section -->
		<section class="klagebrev p-0-20">
			<div class="siste">
				<?php
					$args = array(
					    'post_type' => 'klagebrev',
					    'posts_per_page' => 3,
					    'tax_query' => array(
					        array(
					          'taxonomy' => 'klagebrevkategori',
					          'field' => 'slug',
					          'terms' => 'mest-brukte-klagebrev'
					        )
					    )
					);

					$hsvar_query = new WP_Query($args);

					while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
					    echo '<div class="child">';
					    	$importedID = $post->ID;


					   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
					    	echo '<a href="' . get_permalink() .'">';
					    	echo '<p>' . $post->post_excerpt . '</p></a>';

					    	echo apply_filters('the_content', $post->post_content);
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

			<div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Bil</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Bompenger<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'bompenger',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Kj&oslash;p av bil<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'kjop-av-bil',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Leieav bil<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'leie-av-bil',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Parkering<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'parkering',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Verksted<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'verksted',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Bolig</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Bygge<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'bygge',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Eiendomsmekling<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'eiendomsmekling',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Kj&oslash;p og salg av brukt bolig<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'kjop-og-salg-av-brukt-bolig',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Kj&oslash;pe ny bolig<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'kjope-ny-bolig',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Leie bolig<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'leie-bolig',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Takst<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'takst',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Flyttebyr&aring;<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'flyttebyra',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Bank/Forsikring</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Innskudd<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'innskudd',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Kausjon<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'kausjon',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Investeringsr&aring;dgivning<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'investeringsradgivning',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>L&aring;n<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'lan',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>L&aring;nefinansierte strukturerte spareprodukter<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'lanefinansierte-strukturerte-spareprodukter',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Misbruk av bankkort<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'misbruk-av-bankkort',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Oppsigelse av forsikring<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'oppsigelse-av-forsikring',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Skadeoppgj&oslash;r<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'skadeoppgjor',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Tegning av forsikring<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'tegning-av-forsikring',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Bredb&aring;nd/Internett/Mobil</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Ufrivillig abonnement<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'ufrivillig-abonnent',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Underholdningstelefoni/telesex<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'underholdningstelefonitelesex',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Urettmessig krav p&aring; innbetaling av mobile innholdstjenester ved deltakelse i konkurranse<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'urettmessig-krav-pa-betaling-av-mobile-innholdstjenester-ved-deltakelse-i-konkurranse',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Urettmessig krav p&aring; mobile innholdstjenester<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'urettmessig-krav-pa-mobile-innholdstjenester',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Varen har en mangel, jeg vil reklamere<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'varen-har-en-mangel-jeg-vil-reklamere',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

			<!-- Timeshare -->
			<div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Ferieklubb/Timeshare</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Avbryte timeshare-handelen<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'avbryte-timeshare-handelen',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Sperre betaling/Overf&oslash;ring<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'sperre-betalingoverforing',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Fly</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Bagasje<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'bagasje',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Forsinkelse<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'forsinkelse',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Kansellering<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'kansellering',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Klage p&aring; assistanse<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'klage-pa-assistanse',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Klage til lufthavn<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'klage-til-lufthavn',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Overbooking<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'overbooking',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>H&aring;ndverkere</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Forsinkelse i arbeidet<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'forsinkelse-i-arbeidet',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Utf&oslash;rte tilleggstjenester utenfor avtalen<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'utforte-tilleggstjenester-utenfor-avtalen',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Problemer med regningen<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'problemer-med-regningen',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Mangelfult arbeid<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'mangelfult-arbeid',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Inkasso</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Brudd p&aring; inkassoskikk<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'brudd-pa-inkassoskikk',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Feil i oppgitte gebyr<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'feil-i-oppgitte-gebyr',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Betalingsordning<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'betalingsordning',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Omstridt krav<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'omstridt-krav',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Kj&oslash;p av varer</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Avbestille<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'avbestille',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Inkassovarsel<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'inkassovarsel',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Klage p&aring; regning<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'klage-pa-regning',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Varen har en mangel<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'varen-har-en-mangel',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Offentlige tjenester</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Barnehage<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'barnehage',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Kommunale tjenester<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'kommunale-tjenester',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Skolefritidsordning<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'skolefritidsordning',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Vann og avl&oslash;p<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'vann-og-avlop',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Pakkereiser</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Avbestilling<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'avbestilling',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Heving av kj&oslash;p f&oslash;r gjennomf&oslash;rt reise<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'heving-av-kjop-for-gjennomfort-reise',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Mangelfull reise<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'mangelfull-reise',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Privatskoler</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Kvalitet p&aring; undervisning/lokale<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'kvalitet-pa-undervisninglokale',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Mislighold av studiekontrakt fra elevens side<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'mislighold-av-studiekontrakt-av-elevens-side',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Oppsigelse<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'oppsigelse',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Skolens administrative forhold<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'skolens-administrative-forhold',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Pris<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'pris',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Str&oslash;m</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Angrer inng&aring;else av kraftleveringsavtale<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'angrer-inngaelse-av-kraftleveringsavtale',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Etterfakturering av nettleie<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'etterfakturering-av-nettleie',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Etterfakturering av str&oslash;mforbruk<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'etterfakturering-av-stromforbruk',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Skade for&aring;rsaket av str&oslash;m<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'skade-forarsaket-av-strom',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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

		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">

			    	<div class="mainheader-icon"></div>
					<h4>Tjenester</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt">

			    	</div>
			    	<div class="subchild">
				    	<div class="subheader">
				    		<h4>Krav som f&oslash;lge av brutt avtale<div class="subheader-icon"></div></h4>

			    		</div>
			    		<div class="subcontent">
			    			<?php
								$args = array(
								    'post_type' => 'klagebrev',
								    'posts_per_page' => 50,
								    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'klagebrevkategori',
											        'field'    => 'slug',
											        'terms'    => 'krav-som-folge-av-brutt-avtale',
											    ),
											),
								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) );
								    	echo '<a href="' . get_permalink() .'">';
								    	echo '<p>' . $post->post_excerpt . '</p></a>';

								    	echo apply_filters('the_content', $post->post_content);
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
