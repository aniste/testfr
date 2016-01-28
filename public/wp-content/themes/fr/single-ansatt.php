<?php get_header(); ?>
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
		<div class="metainfo">
		<span class="date">
		<?php 
			$stilling = $cfs->get('stilling');
			echo $stilling;
		?>
		</span>
	</div>
		<!-- section -->
		<section class="ansatt">
			<?php
				$ansattbilde = $cfs->get('ansattbilde');
				echo '<div class="ansatt-mainimage"><a target="_blank" href="' . wp_get_attachment_url($ansattbilde) . '">' . wp_get_attachment_image( $ansattbilde, 'medium' )  . '</a></div>';
				$stilling = $cfs->get('stilling');
				echo '<div class="stilling">' . $stilling . '</div>';
				$telefon = $cfs->get('telefon');
				echo '<div class="telefon">' . $telefon . '</div>';
				$epost = $cfs->get('epost');
				echo '<div class="epost">' . $epost . '</div>';
	
				echo '<br />';				

				$attachment_id = $cfs->get( 'flere_pressebilder' );
				if($attachment_id != '') {
					foreach ($attachment_id as $attach) {
						echo '<div class="additional_image"><a target="_blank" href="' . wp_get_attachment_url($attach['last_opp_bilde']) . '">' . wp_get_attachment_image( $attach['last_opp_bilde'], 'thumbnail' )  . '</a></div>';
					}
				}

			?>
		</section>
		<!-- /section -->
		
	</main>
<?php get_footer(); ?>