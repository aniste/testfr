<?php /* Template name: FPA mening*/ get_header(); ?>

<?php 
	$url = $_SERVER["REQUEST_URI"];

	if(strpos($url, 'fpa-bolig') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/fpa-bolig/"> Vi mener - Bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	} else if (strpos($url, 'fpa-finans') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/fpa-finans/"> Vi mener - Finans</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	} else if (strpos($url, 'fpa-digital') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/fpa-digital/"> Vi mener - Digital</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'fpa-mat-produktsikkerhet-og-handel') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/fpa-mat-produktsikkerhet-og-handel/"> Vi mener - Mat og handel</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'fpa-offentlig-og-helse') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/fpa-offentlig-og-helse/"> Vi mener - Offentlige tjenester</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'vi-mener') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/fpa-offentlig-og-helse/"> Vi mener - Offentlige tjenester</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else {
	}
?>


<main role="main">
	<div class="parent">
		<?php if ( have_posts() ) {  /* Query and display the parent. */
			while ( have_posts() ) { ?>
			<div class="topheader">

				<h3><!--Vi mener-->&nbsp;</h3>
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
				echo 'Publisert ';
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
				include 'pressekontakt.php';
			?>
			<?php
				include 'faktaboks.php';
			?>
			<?php
				include 'fotoboks.php';
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
			<div class="thirds-container p-0-20">
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
</div>
<?php get_footer(); ?>
