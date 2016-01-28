<?php /* Template name: Nivå 5 - Ansatt*/ get_header(); ?>
	<main role="main">
		<div class="parent">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<div class="topheader">
					<h1><?php the_title(); ?></h1>
					<h3><?php the_excerpt(); ?></h3>
				</div>
				<?php
					the_post();
					$thispage=$post->ID;
				}
			} ?>
			<hr class="short-hr"/>
		</div>
		<div class="parent-content">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<?php
					the_post();
					the_content();
					$thispage=$post->ID;
				}
			} 

			?>
		</div>
		<!-- section -->
		<section class="ansatt">
			<?php
				// Display everything within the "faq_section" loop
				//http://forbrukerradet.local/wp-content/themes/fr/
				//$templatepath = get_template_directory_uri();
				$ansattbilde = $cfs->get('ansattbilde');
				echo wp_get_attachment_image( $ansattbilde, 'thumbnail' );
				$stilling = $cfs->get('stilling');
				echo '<div class="stilling">' . $stilling . '</div>';
				$telefon = $cfs->get('telefon');
				echo '<div class="telefon">' . $telefon . '</div>';
				$epost = $cfs->get('epost');
				echo '<div class="epost">' . $epost . '</div>';
	

				$attachment_id = $cfs->get( 'flere_pressebilder' );
				foreach ($attachment_id as $attach) {
					echo wp_get_attachment_image( $attach['last_opp_bilde'], 'thumbnail' );
				}
				

			?>
		</section>
		<!-- /section -->
		
	</main>
<?php get_footer(); ?>
