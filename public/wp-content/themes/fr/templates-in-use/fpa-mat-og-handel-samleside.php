<?php /* Template name: FPA Mat og Handel */ get_header(); ?>
	<main role="main" class="contentfield">
		<div class="parent">
		<div class="headerimage"></div>
		<div class="frontpage-nav-wrapper">
		<?php

				if (has_post_thumbnail()) {

				$imgID = get_post_thumbnail_id($post->ID);
				$featuredImage = cl_wp_get_attachment_image_src($imgID, 'full' );
				$imgURL = $featuredImage[0];

				?>
				<style type="text/css">
				    .headerimage {
				        background-image:url('<?php echo $imgURL ?>');
					}
			  </style>

			 <?php
			}

			?>
			<?php if ( have_posts() ) {
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
		<div>

		</div>
		<div class="related">
		<div class="omrade">
			<div class="head-container"><h3 class="head p-0-20">Vi mener</h3></div>
					<section class="pressemeldinger vimener p-0-20">
						<?php
								$current_year = date('Y');
								$args = array(
								    'post_type' => 'post',
								    'posts_per_page' => 2,
								    'tag' => 'vi-mener',
								    'category_name' => 'fpa-mat-og-handel,fpa-mat-og-handel-2015',
								    //'year' => $current_year,
								    'orderby' => 'post_date',
									'order' => 'DESC',
								);

								$presse_query = new WP_Query($args);
								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;

								  		echo '<div class="col-l">';
								    	echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3>';

								    	echo '<p>';
										$ingressteksten = CFS()->get('ingress');
									    	if ($ingressteksten != '') {echo $ingressteksten;}
										echo '</p></a>';

								    	echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<div class="les_mer">Les hele saken</div>';
								    	echo '</div>';
								    	echo '<div class="col-r"><div class="half-image">';

								    	$image = the_post_thumbnail('large');
										echo '</div>';
										echo '</div>';
								    echo '</a></div>';
								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>

							<div class="dropdown">
							    <div class="dropdown-header" data-toggle="collapse">
							    	<div class="mainheader-icon"></div>
									<h3>Se flere saker</h3>
							    </div>
							    <div class="dropdown-collapse">
							    	<div class="dropdown-child-excerpt">
								    	<?php
										   function posts_by_year() {
											  // array to use for results
											  $years = array();

											  // get posts from WP
											  $posts = get_posts(array(
											    'numberposts' => 500,
											    'orderby' => 'post_date',
											    'order' => 'DESC',
											    'offset' => 2,
											    'post_type' => 'post',
											    'post_status' => 'publish',
											    'tag' => 'vi-mener',
											    // 'date_query' => array(
											    //     'before' => date('Y', strtotime('-2 months'))
											    // ),
											    'category_name' => 'fpa-mat-og-handel,fpa-mat-og-handel-2015,fpa-mat-og-handel-2014,fpa-mat-og-handel-2013,fpa-mat-og-handel-2012,fpa-mat-og-handel-2011',
											  ));

											  // loop through posts, populating $years arrays
											  foreach($posts as $post) {
											    $years[date('Y', strtotime($post->post_date))][] = $post;
											  }

											  // reverse sort by year
											  krsort($years);

											  return $years;
											}
										?>
										<?php foreach(posts_by_year() as $year => $posts) : ?>
										  <!-- <h4><?php echo $year; ?></h4> -->
										  <div class="child-container">
										    <?php foreach($posts as $post) : setup_postdata($post); ?>

											     <?php
											      echo '<div class="child">';
											    	$importedID = $post->ID;


											   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

											    	echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
											    	echo '<a class="ingresslink" href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<p>' . $post->post_excerpt . '</p></a>';

											    echo '</div>';
										      ?>

										    <?php endforeach; ?><div class="clear"></div>
										  </div>
										<?php endforeach; ?>
							    	</div>
						    	</div>
						    </div>
					</section>
			</div>
		<?php
			include 'relaterte_saker.php';
		?>
		<?php
			$values = CFS()->get('kjernesak');
			if ($values != '') {
		?>
			<div class="omrade">
				<div class="head-container"><h3 class="head p-0-20">Vi arbeider for</h3></div>
				<main>
					<section class="pressemeldinger vimener p-0-20">
					<?php
					$used_post_id = array();

					$values = CFS()->get('kjernesak');

					if ($values != ''){
							foreach ($values as $post_id) {

								echo '<div class="child">
									<div class="col-l">';
										echo '<a href="' . get_permalink($post_id) . '">';
										echo '<h3>' . get_the_title( $post_id ) . '</h3>';

										echo '<p>';
										$ingressteksten = CFS()->get('ingress', $post_id);
									    	if ($ingressteksten != '') {echo $ingressteksten;}
										echo '</p><div class="les_mer">Les hele artikkelen</div>';

									echo '</div>';

									echo '<div class="col-r">';
										$relatertbilde = $cfs->get('artikkelbilde', $post_id);
										$image = wp_get_attachment_url( get_post_thumbnail_id($post_id));
										echo '<img src="' . $image . '" />';
									echo '</div>';
								echo '</a></div>';


								array_push($used_post_id, $post_id);
							}
						}
					?>
					<div class="clear"></div>
					<div class="dropdown">
						    <div class="dropdown-header" data-toggle="collapse">
						    	<div class="mainheader-icon"></div>
								<h3>Se mer</h3>
						    </div>
						    <div class="dropdown-collapse">
						    	<div class="dropdown-child-excerpt">
							    	<?php
									   function kjernesak_by_year() {
										  // array to use for results
										  $years = array();

										  // get posts from WP
										  $posts = get_posts(array(
										    'numberposts' => -1,
										    'orderby' => 'post_date',
										    'order' => 'DESC',
										    'post_type' => 'kjernesak',
										    'post_status' => 'publish',

										    // 'date_query' => array(
										    //     'before' => date('Y', strtotime('-2 months'))
										    // ),
										    'tax_query' => array(
											    'relation' => 'OR',
											    array(
											        'taxonomy' => 'kjernesakkategori',
											        'field'    => 'slug',
											        'terms'    => 'mat-og-handel',
											    ),
											),
										  ));

										  // loop through posts, populating $years arrays
										  foreach($posts as $post) {
										    $years[date('Y', strtotime($post->post_date))][] = $post;
										  }

										  // reverse sort by year
										  krsort($years);

										  return $years;
										}
									?>
									<?php foreach(kjernesak_by_year() as $year => $posts) : ?>
									  <h4><?php echo $year; ?></h4>
									  <div class="child-container">
									    <?php foreach($posts as $post) : setup_postdata($post); ?>

										      <?php
											      echo '<div class="child">';
											    	$importedID = $post->ID;


											   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

											    	echo '<a href="' . get_permalink() .'">' . '<h3>' . $post->post_title . '</h3></a>';
											    	echo '<p>' . $post->post_excerpt . '</p>';

											    echo '</div>';
										      ?>

									    <?php endforeach; ?><div class="clear"></div>
									  </div>
									<?php endforeach; ?>
						    	</div>
					    	</div>
					    </div>
					</section>
				</main>
			</div>
		<?php
			}
			else {
				NULL;
			}
		?>
			<div class="omrade">
				<div class="head-container"><h3 class="head p-0-20">H&oslash;ringer</h3></div>
				<main class="horinger">
				<section class="hside p-0-20">
					<?php
						$args = array(
						    'post_type' => 'horinger',
						    'posts_per_page' => 2,
						    'tax_query' => array(
						        array(
						          'taxonomy' => 'horingerkategori',
						          'field' => 'slug',
						          'terms' => 'fpa-mat-og-handel'
						        )
						    )
						);

						$hsvar_query = new WP_Query($args);

						while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
						    echo '<div class="child">';
						    	$importedID = $post->ID;

						   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
						    	echo '<h3>' . $post->post_title . '</h3>';
						    	echo '<p>' . $post->post_excerpt . '</p>';
						    	echo '<p>' . $post->post_content . '</p>';
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
					<div class="dropdown">
							    <div class="dropdown-header" data-toggle="collapse">
							    	<div class="mainheader-icon"></div>
									<h3>Se alle h&oslash;ringer</h3>
							    </div>
							    <div class="dropdown-collapse">
							    	<div class="dropdown-child-excerpt">
							    		<?php
											$args = array(
											    'post_type' => 'horinger',
											    'posts_per_page' => 250,
											    'offset' => 6,
											    'tax_query' => array(
											        array(
											          'taxonomy' => 'horingerkategori',
											          'field' => 'slug',
											          'terms' => 'fpa-mat-og-handel'
											        )
											    )
											);

											$hsvar_query = new WP_Query($args);

											while ($hsvar_query->have_posts()) : $hsvar_query->the_post();
											    echo '<div class="child">';
											    	$importedID = $post->ID;

											   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
											    	echo '<h3>' . $post->post_title . '</h3>';
											    	echo '<p>' . $post->post_excerpt . '</p>';
											    	echo '<p>' . $post->post_content . '</p>';
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
					</section>
					<div class="clear"></div>
				</main>
			</div>
		</div>

		<br />

		<div class="clear"></div>
		<?php
			include 'fagperson.php';
		?>
		<div class="clear"></div>
		</div></div>
		<?php get_footer(); ?>
	</main>
