<?php /* Template name: Samleside pressemeldinger */ get_header(); ?>
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
		<section class="pressekontakter p-0-20">
			<div class="pressekontakter-container">
				<h3>Pressekontakter</h3>
				<?php
				$values = CFS()->get('kontakt');
					if ($values != ''){
						foreach ($values as $post_id) {
							echo '<div class="ansatt">';
							$pressebilde = $cfs->get('ansattbilde', $post_id);
							echo '<div class="bilde">' . wp_get_attachment_image( $pressebilde, 'large' ) . '</div>';
							echo '<div class="navn">' . get_the_title( $post_id ) . '</div>';
							$stilling = $cfs->get('stilling', $post_id);
							echo '<div class="stilling">' . $stilling . '</div>';
							$ansvarsomrade = $cfs->get('ansvarsomrde', $post_id);
							echo '<div class="stilling">' . $ansvarsomrade . '</div>';
							$telefon = $cfs->get('telefon', $post_id);
							echo '<div class="telefon">' . $telefon . '</div>';
							$epost = $cfs->get('epost', $post_id);
							echo '<div class="epost">' . $epost . '</div>';
							echo '</div>';
						}
					}
				?>
			</div>
		</section>
		<div class="clear"></div>
		<section class="pressemeldinger p-0-20">
			<h3>Pressemeldinger</h3>
			<?php
					$args = array(
						'post_type' => 'post',
					    'posts_per_page' => 4,
					    'tag' => 'pressemelding',
					);

					$presse_query = new WP_Query($args);

					while ($presse_query->have_posts()) : $presse_query->the_post();

					    echo '<div class="child">';
					    	$importedID = $post->ID;


					   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

					    	echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
					    	echo '<p>' . $post->post_excerpt . '</p>';

					    echo '</div>';

					endwhile;
					wp_reset_postdata();
				?>
				<div class="clear"></div>

		</section>
		<section class="arkivpressemelding p-0-20">
			<div class="archived">
				<h3>Arkiv pressemeldinger</h3>
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2016</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt">
				    		<?php
								$args = array(
									'post_type' => 'post',
								    'posts_per_page' => 500,
								    'offset' => 4,
								    'tag' => 'pressemelding',
								    'year' => 2016,
								    'category_name' => 'pressemelding',
								);

								$presse_query = new WP_Query($args);

								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;


								   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

                    echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';

								    echo '</div>';

								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
				    	</div>
			    	</div>
			    </div>
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4>2015</h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt">
				    		<?php
								$args = array(
									'post_type' => 'post',
								    'posts_per_page' => 500,
								    'tag' => 'pressemelding',
								    'year' => 2015,
								    'category_name' => '2015-pressemelding',
								);

								$presse_query = new WP_Query($args);

								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;


								   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';

                    echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';

								    echo '</div>';

								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
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
									'post_type' => 'post',
								    'posts_per_page' => -1,
								    'tag' => 'pressemelding',
								    'category_name' => '2014-pressemelding',
								);

								$presse_query = new WP_Query($args);
								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
                    echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';
								    echo '</div>';
								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
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
									'post_type' => 'post',
								    'posts_per_page' => -1,
								    'tag' => 'pressemelding',
								    'category_name' => '2013-pressemelding',
								);

								$presse_query = new WP_Query($args);
								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
                    echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';
								    echo '</div>';
								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
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
									'post_type' => 'post',
								    'posts_per_page' => -1,
								    'tag' => 'pressemelding',
								    'category_name' => '2012-pressemelding',
								);

								$presse_query = new WP_Query($args);
								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
                    echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';
								    echo '</div>';
								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
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
									'post_type' => 'post',
								    'posts_per_page' => -1,
								    'tag' => 'pressemelding',
								    'category_name' => '2011-pressemelding',
								);

								$presse_query = new WP_Query($args);
								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
                    echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';
								    echo '</div>';
								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
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
									'post_type' => 'post',
								    'posts_per_page' => -1,
								    'tag' => 'pressemelding',
								    'category_name' => '2010-pressemelding',
								);

								$presse_query = new WP_Query($args);
								while ($presse_query->have_posts()) : $presse_query->the_post();

								    echo '<div class="child">';
								    	$importedID = $post->ID;
								   		echo '<div class="date">' . mysql2date('d. F, Y', $post->post_date)  . '</div>';
                    echo '<a href="' . rewrite_post_parmalink(get_permalink()) .'">' . '<h3>' . $post->post_title . '</h3></a>';
								    	echo '<p>' . $post->post_excerpt . '</p>';
								    echo '</div>';
								endwhile;
								wp_reset_postdata();
							?>
							<div class="clear"></div>
				    	</div>
			    	</div>
			    </div>
			</div>
			<div class="clear"></div>
		</section>
		<br />
		<section class="pressebilder p-0-20">
			<h3>Pressebilder</h3>
		<div class="dropdown">
		<?php
			// Get the loop fields (returns an associative array)
			$loop = $cfs->get('pressebilder');

			// Iterate through the fields
			foreach ($loop as $field) {
			    // returns an array of post IDs, which we need to iterate through
			    $my_relationship = $field['person'];
		?>
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h4><?php echo $field['navn_p_stilling'];?></h4>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt">
				    	<?php
				    		foreach ($my_relationship as $post_id) {

					    	$all_fields = $cfs->get(false, $post_id);
					    	// Pass the post ID into get_the_title to get the post's title

					    	$hovedbildeinfo = wp_get_attachment( $all_fields['ansattbilde'] );
						    $hovedbildedetaljer = wp_get_attachment_metadata( $all_fields['ansattbilde'] );
						?>
						    <div class="ansatt-pressebilder">
						        <div class="ansatt-tittel">
						        	<strong><?php echo get_the_title($post_id); ?></strong>, <?php echo $all_fields['stilling']; ?>
						        </div>
					        <div>
					        <div class="image-w-info">
					        <div class="images">
					        	<div class="image">
					        		<?php echo '<a href="' . wp_get_attachment_url($all_fields['ansattbilde']) . '">'; echo wp_get_attachment_image( $all_fields['ansattbilde'], 'large' ) ;?></a>
					        	</div>

					        <div class="bildeinformasjon">
					        	<div class="resolution"><?php echo $hovedbildedetaljer['width'] . 'px x ' . $hovedbildedetaljer['height'] . 'px</div>';?>
						    	<div class="caption"><?php echo $hovedbildeinfo['caption'] ?></div></div>
					    	</div>
					    	</div>
					    	<?php
						    if ($all_fields['flere_pressebilder'] != '') {

						        foreach ($all_fields['flere_pressebilder'] as $add_img) { ?>
						        	<div class="image-w-info">
						        	<div class="images">
							        	<?php echo '<div class="image"><a href="' . wp_get_attachment_url($add_img['last_opp_bilde']) . '">'  . wp_get_attachment_image( $add_img['last_opp_bilde'], 'large' ) . '</a></div>';
							        	$bildeinfo = wp_get_attachment( $add_img['last_opp_bilde'] );
							        	$bildedetaljer = wp_get_attachment_metadata( $add_img['last_opp_bilde'] );?>

							        	<div class="bildeinformasjon">
							        		<div class="resolution"> <?php echo $bildedetaljer['width'] . 'px x ' . $bildedetaljer['height'] ?> px</div>
							        		<div class="caption"> <?php echo $bildeinfo['caption'] ?></div>
							        	</div>
							        	</div>
							        	</div>
							        		<?php	}
						       				} ?>
							     		<div class="clear"></div>
						     		</div>
						     </div>
					     <div class="clear"></div>

					    <?php } ?>

							<div class="clear"></div>
				    	</div>
			    	</div>
			 	<?php } ?>
			    </div>
		</section>
		<div class="clear"></div>
		<section class="innsyn p-0-20">
		<?php
			$innsyn = $cfs->get('innhold');
			echo $innsyn;
		?>
		</section>
		<div class="clear"></div>
		<!-- /section -->
		</div>
		<?php get_footer(); ?>
	</main>
