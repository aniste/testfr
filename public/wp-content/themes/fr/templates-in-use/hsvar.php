<?php /* Template name: Høringssvar */ get_header(); ?>
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
					$innledendetekst = CFS()->get('innledende_tekst');
				    	if ($innledendetekst != '') {
				    		echo '<p class="article-ingress">' . $innledendetekst . '</p>';
				    	}
					the_post();
					the_content();
					$thispage=$post->ID;
				}
			}
			?>
		</div>
		<!-- section -->
		<section class="hside">
			<div class="siste">
				<?php
					$args = array(
					    'post_type' => 'horinger',
					    'posts_per_page' => 500,
					    'tax_query' => array(
					        array(
					          'taxonomy' => 'horingerkategori',
					          'field' => 'slug',
					          'terms' => '2015'
					        )
					    )
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
					    	echo '<h3 class="hsvartitle">' . $post->post_title . '</h3>';
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
				<div class="clear"></div>
			</div>
			<div class="archived">
				<h5>Arkiv h&oslash;ringer</h5>
				<br />
				
			<div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">
			    	<!-- <div class="child-header-icon"></div> -->
			    	<div class="mainheader-icon"></div>
					<h4>2014</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt"> 
			    		<?php
							$args = array(
							    'post_type' => 'horinger',
							    'posts_per_page' => 500,
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'horingerkategori',
							          'field' => 'slug',
							          'terms' => '2014'
							        )
							    )

							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	$importedID = $post->ID;

							    
							   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

							    	echo '<h3 class="hsvartitle">' . $post->post_title . '</h3>';
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
			    	</div>
				</div>
			</div>
			<div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">
			    	<!-- <div class="child-header-icon"></div> -->
			    	<div class="mainheader-icon"></div>
					<h4>2013</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt"> 
			    		<?php
							$args = array(
							    'post_type' => 'horinger',
							    'posts_per_page' => 500,
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'horingerkategori',
							          'field' => 'slug',
							          'terms' => '2013'
							        )
							    )

							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	$importedID = $post->ID;

							    
							   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

							    	echo '<h3 class="hsvartitle">' . $post->post_title . '</h3>';
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
			    	</div>
				</div>
			</div>
			<div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">
			    	<!-- <div class="child-header-icon"></div> -->
			    	<div class="mainheader-icon"></div>
					<h4>2012</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt"> 
			    		<?php
							$args = array(
							    'post_type' => 'horinger',
							    'posts_per_page' => 500,
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'horingerkategori',
							          'field' => 'slug',
							          'terms' => '2012'
							        )
							    )

							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	$importedID = $post->ID;

							    
							   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

							    	echo '<h3 class="hsvartitle">' . $post->post_title . '</h3>';
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
			    	</div>
				</div>
			</div>
		    <div class="dropdown">
			    <div class="dropdown-header" data-toggle="collapse">
			    	<!-- <div class="child-header-icon"></div> -->
			    	<div class="mainheader-icon"></div>
					<h4>2011</h4>
			    </div>
			    <div class="dropdown-collapse">
			    	<div class="dropdown-child-excerpt"> 
			    		<?php
							$args = array(
							    'post_type' => 'horinger',
							    'posts_per_page' => 500,
							    'tax_query' => array(
							        array(
							          'taxonomy' => 'horingerkategori',
							          'field' => 'slug',
							          'terms' => '2011'
							        )
							    )

							);


							$hsvar_query = new WP_Query($args);


							while ($hsvar_query->have_posts()) : $hsvar_query->the_post();

							    echo '<div class="child">';
							    	$importedID = $post->ID;

							    
							   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

							    	echo '<h3 class="hsvartitle">' . $post->post_title . '</h3>';
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
