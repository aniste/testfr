<?php /* Template name: FPA Enkeltartikkel */ get_header(); ?>

<main role="main">
		<div class="parent">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<div class="topheader">
					<h3><?php the_excerpt(); ?></h3>
					<h1><?php the_title(); ?></h1>
					
				</div>
				<?php
					the_post();
					$thispage=$post->ID;
				}
			} ?>
		</div>
		<div class="parent-content">
		
		<div class="metainfo">
			<span class="date">
			<?php 
				if (0 < $cfs->get('publiseringsinformasjon')) {
					echo 'Publisert ';
					echo the_time('j. F, Y');
				}
				else {
					echo '';
				}
			?>
			</span>
		</div>
			<section class="article-content">
				<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<?php
					the_post();
					the_content();
					$thispage=$post->ID;
				}
			} 
			?>
			<?php
				$ingress_text = $cfs->get('ingresstekst');
				if ($ingress_text != '') {
					echo '<p class="article-ingress">' . $ingress_text . '</p>';
				}
				$article_content = $cfs->get('innhold');
				if ($article_content != '') {
					echo '<div class="wig-content">' . $article_content . '</div>';
				}
			?>
			
			</section>
			<section class="article-column">
			<?php
			$values = CFS()->get('pressekontakter');
				if ($values != ''){
					foreach ($values as $post_id) {
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
			<?php
				include 'faktaboks.php';
			?>
			</section>
			<div class="clear"></div>
		</div>		
	</main>
<?php
	$values = CFS()->get('relaterte_saker');
	if ($values != '') {
?>
	<div class="related">
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
<?php 
	}
	else {
		NULL;
	}
?>
<?php get_footer(); ?>
