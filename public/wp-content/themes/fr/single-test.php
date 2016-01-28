<?php /* Template name: Single Test X */ get_header(); ?>
<div class="C_breadcrumb p-0-20">
	<a href="/">Forside</a> > <a href="/forside/vi-undersoker/">Tester, guider og undersøkelser</a> > <?php the_title(); ?>	
</div>
<main role="main">	
	<div class="parent-content">
	<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<div class="topheader">
				<h2>TEST</h2><h1>
				<?php
					the_title();
					?>
				</h1>
					</div>
					<?php the_post();
					$thispage=$post->ID;
				}
			} 

			?>
		<div class="metainfo">
				<span class="date">
				<?php 
					echo the_time('j. F, Y');
				?>
				
				</span>
			</div>
			<section class="article-content">
				<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
					<?php
					echo '<div class="ingressteksten">';
					$ingressteksten = CFS()->get('ingress');
				    	if ($ingressteksten != '') {echo $ingressteksten;}
					echo '</div>';
					the_post();
					the_content();
					$thispage=$post->ID;
				}
			} 

			?>
			<?php 

			$hiddeninfo = $cfs->get('skjult_innhold');
				if ($hiddeninfo != '') {
					echo '<div class="additions">';
					foreach ($hiddeninfo as $wysiwyg) {
						echo '<div class="archive_drop collapsed">';
							echo '<div class="archive-header">' . $wysiwyg['overskrift_skjult_innhold'] . '<div class="archive-header-icon"></div></div>';
							echo '<div class="collapse"><div class="innholdsfelt_skjult">' . $wysiwyg['innholdsfelt_wysiwyg'] . '</div><div class="clear"></div></div>';
						echo '</div>';
					}
					echo '</div>';
				}

				
			?>

			<?php
				$article_content = $cfs->get('innhold');
				if ($article_content != '') {
					echo '<div class="wig-content">' . $article_content . '</div>';
				}
			?>
			</section>
			
			<!-- <aside>
				
			</aside> -->
			<section class="article-column">
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
							echo '<h4>' . get_the_title( $post_id ) . '</h4';
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
</div>
<?php get_footer(); ?>
