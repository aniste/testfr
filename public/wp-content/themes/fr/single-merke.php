<?php /* Template name: Merke - enkelt*/ get_header(); ?>

<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/merkeoversikten/"> Merkeoversikten</a> > <?php the_title(); ?>
</div>

<main role="main">
		<div class="parent">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<div class="topheader">
					<h2>MERKE</h2>
					<h1><?php the_title(); ?></h1>
					<!-- <h3><?php the_excerpt(); ?></h3> -->
					
				</div>
				<?php
					the_post();
					$thispage=$post->ID;
				}
			} ?>
		</div>
		<div class="parent-content p-0-20">
		
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
					echo '<div class="ingressteksten">';
					$ingressteksten = CFS()->get('ingress');
				    	if ($ingressteksten != '') {echo $ingressteksten;}

					echo '</div>';
					the_content();

					$thispage=$post->ID;
				}
			} 

			?>
			
			</section>

			<section class="article-column">
				<?php
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					  the_post_thumbnail( 'medium' );
					}
				?>
				<?php
					include 'pressekontakt.php';
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
							echo '<h4>' . get_the_title( $post_id ) . '</h4>';
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
