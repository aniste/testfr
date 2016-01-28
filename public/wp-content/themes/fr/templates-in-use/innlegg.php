<?php /* Template name: Innlegg */ get_header(); ?>
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
					<h3><?php the_excerpt(); ?></h3>
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
		<div>
			
		</div>
		<div class="related">
		<div class="omrade">
			<div class="head-container"><h3 class="head">Vi mener</h3></div>
			
					<section class="pressemeldinger vimener">
						<?php
								$args = array(
								    'post_type' => 'post',
								    'posts_per_page' => 2,
								    'tag' => 'vi-mener',
								    'category_name' => 'fpa-mat-og-handel',
								);
								// Query the posts:
								$presse_query = new WP_Query($args);
								while ($presse_query->have_posts()) : $presse_query->the_post();
								    // Echo some markup
								    echo '<div class="child">';
								    	$importedID = $post->ID;
								    	// the_title();
								    	
								   		// echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
								  		// echo $post->ID;
								  		echo '<div class="col-l">';
								    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';
								    	// echo '<p>' . $post->post_content . '</p>';
								    	echo '<a href="' . get_permalink() .'">' . '<div class="les_mer">Les hele artikkelen</div></a>';
								    	echo '</div>';
								    	echo '<div class="col-r"><div class="half-image">';
								    	// $image = wp_get_attachment_url( get_post_thumbnail_id($post_id));
								    	$image = the_post_thumbnail('large');
										echo '</div>';
										echo '</div>';
								    echo '</div>'; // Markup closing tags.
								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
							<!-- <h3>Slutt</h3> -->
							<div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">
			    	<!-- <div class="child-header-icon"></div> -->
			    	<div class="mainheader-icon"></div>
					<h3>Se alle v&aring;re meninger</h3>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt"> 
			    		<?php
								$args = array(
								    'post_type' => 'post',
								    'posts_per_page' => 50,
								    'offset' => 2,
								    'tag' => 'vi-mener',
								    'category_name' => 'fpa-mat-og-handel',

								);
								$hsvar_query = new WP_Query($args);
								while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
								    echo '<div class="child">';
								    	echo '<div class="article-image">';
								    	$importedID = $post->ID;
								    
								   		// echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
								  		the_post_thumbnail( array( 364, 243), array( 'class' => 'test-image' ) ); echo '</div>';
								    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';
								    	$vedlegg = CFS()->get('vedlegg');
								    	if ($vedlegg != '') {
								    		foreach ($vedlegg as $infotekst) {
								    			 // echo $infotekst['tekst'];
								    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
								    		}
								    	}
								    echo '</div>'; // Markup closing tags.
								    
								endwhile;
								wp_reset_postdata();
							?>
			    	</div>
		    	</div>
		    </div>
					</section>
			</div>
			<div class="omrade">
				<div class="head-container"><h3 class="head">Relaterte saker</h3></div>
				<main>
					<div class="thirds-container">
					<?php
					$used_post_id = array();

					$values = CFS()->get('relaterte_saker');
					if ($values != ''){
							foreach ($values as $post_id) {
								echo '<div class="thirds">';
								echo '<a href="' . get_permalink($post_id) . '">';
									$relatertbilde = $cfs->get('artikkelbilde', $post_id);
									//echo '<div class="bilde">' . wp_get_attachment_image( $relatertbilde, 'medium' ) . '</div>';
									$image = wp_get_attachment_url( get_post_thumbnail_id($post_id));
									echo '<img class="thirds" src="' . $image . '" />';
									echo '<div class="thirds-text">' . get_the_title( $post_id ) . '</div>';
								echo '</a></div>';

								
								array_push($used_post_id, $post_id);
							}
						}
					?>
				</main>
			</div>
			<div class="omrade">
				<div class="head-container"><h3 class="head">V&aring;re kjernesaker</h3></div>
				<main>
					<div class="thirds-container">
					<?php
					$used_post_id = array();

					$values = CFS()->get('relaterte_saker');
					if ($values != ''){
							foreach ($values as $post_id) {
								echo '<div class="thirds">';
								echo '<a href="' . get_permalink($post_id) . '">';
									$relatertbilde = $cfs->get('artikkelbilde', $post_id);
									//echo '<div class="bilde">' . wp_get_attachment_image( $relatertbilde, 'medium' ) . '</div>';
									$image = wp_get_attachment_url( get_post_thumbnail_id($post_id));
									echo '<img class="thirds" src="' . $image . '" />';
									echo '<div class="thirds-text">' . get_the_title( $post_id ) . '</div>';
								echo '</a></div>';

								
								array_push($used_post_id, $post_id);
							}
						}
					?>
				</main>
			</div>
			<div class="omrade">
				<div class="head-container"><h3 class="head">H&oslash;ringer</h3></div>
				<main class="horinger">
				<section class="hside">
					<?php
						$args = array(
						    'post_type' => 'horinger',
						    'posts_per_page' => 6,
						    // 'tax_query' => array(
						    //     array(
						    //       'taxonomy' => 'horingerkategori',
						    //       'field' => 'slug',
						    //       'terms' => '2015'
						    //     )
						    // )
						    // Several more arguments could go here. Last one without a comma.
						);

						// Query the posts:
						$hsvar_query = new WP_Query($args);

						// Loop through the obituaries:
						while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
						    // Echo some markup
						    echo '<div class="child">';
						    	$importedID = $post->ID;
						    	// the_title();
						    
						   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
						  		// echo $post->ID;
						    	echo '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '<p>' . $post->post_content . '</p>';
						    	$vedlegg = CFS()->get('vedlegg');
						    	if ($vedlegg != '') {
						    		foreach ($vedlegg as $infotekst) {
						    			 // echo $infotekst['tekst'];
						    			 echo '<div class="hsvar-dl">' . '<a href="' . wp_get_attachment_url($infotekst['filnavn']) . '">' . '<div class="icon"></div>' . '<p>Last ned</p>' . '</a></div>'; 
						    		}
						    	}
						    echo '</div>'; // Markup closing tags.
						    
						endwhile;
						wp_reset_postdata();
					?>
					</section>
					<div class="clear"></div>
				</main>
			</div>
		</div>
		
		<br />
		<section class="pressebilder">
			<h5>Fagpersoner</h5>
			<br />
				<?php
				$pressekontakt = $cfs->get('kontakt');
					if ($values != ''){
						foreach ($pressekontakt as $post_id) {
							echo '<div class="ansatt">'; 
							$pressebilde = $cfs->get('ansattbilde', $post_id);
							echo '<div class="bilde">' . wp_get_attachment_image( $pressebilde, 'medium' ) . '</div>';
							echo '<div class="navn">' . get_the_title( $post_id ) . '</div>';
							$stilling = $cfs->get('stilling', $post_id);
							echo '<div class="stilling">' . $stilling . '</div>';
							$telefon = $cfs->get('telefon', $post_id);
							echo '<div class="telefon">' . $telefon . '</div>';
							$epost = $cfs->get('epost', $post_id);
							echo '<div class="epost">' . $epost . '</div>';
							echo '</div>';
						}
					}
				?>
			<div class="clear"></div>
		</section>
		<div class="clear"></div>
		<!-- /section -->
		<?php get_footer(); ?>
	</main>
