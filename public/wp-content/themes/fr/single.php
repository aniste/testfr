<?php
$referer = wp_get_referer();
$post = $wp_query->post;

// check if the URL is a specific one
// Check for tag "Vi mener" and categories FPA
if ( $referer == 'http://forbrukerradet.local/mat-produktsikkerhet-og-handel2/' ) {

	include ('single-fpa_mening.php');

}

elseif ( $referer == 'http://fbr.comingsoon.no/presse/' ) {

	include ('single-fpa_presse.php');

}

elseif (has_tag('vi-mener') && has_category('vi-mener') OR has_category('fpa-bolig') OR has_category('fpa-digital') OR has_category('fpa-finans') OR has_category('fpa-mat-og-handel') OR has_category('fpa-offentlig')) {

	include ('single-fpa_mening.php');
  
}


// Check for tag "Pressemelding" and categories FPA
elseif (has_tag('pressemelding') ) {
  
	include ('single-fpa_presse.php');
  
}


// Check for tag "Nytt og nyttig" and categories FPA
elseif (has_tag('nytt-og-nyttig')) {
  
	include ('single-fpa_nytt.php');
  
}

else {

 /* Template name: FPA Fallback template */ get_header(); ?>
 <?php 
	$url = $_SERVER["REQUEST_URI"];

	if(strpos($url, 'ledig-stilling/') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/jobb-hos-oss/"> Ledige stillinger</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if(strpos($url, 'ledige-stillinger/') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/jobb-hos-oss/"> Ledige stillinger</a> > '?><?php the_title(); ?><?php
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
					<h3>
						<p>
						<?php
							$subheader = CFS()->get('subheader');
						    	if ($subheader != '') {echo $subheader;}
						?>
						</p>
					</h3>
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

<?php

}


get_header(); ?>

