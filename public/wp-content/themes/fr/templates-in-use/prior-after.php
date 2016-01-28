<?php /* Template name: Nivå 3, Før/etter */ get_header(); ?>
<?php 
	$url = $_SERVER["REQUEST_URI"];

	if(strpos($url, 'bil') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	} else if (strpos($url, 'bolig') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	} else if (strpos($url, 'okonomi-og-betaling') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'digitalt') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/digitalt/"> Digitalt</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'reise') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else {
	}
?>
	<main role="main" class="contentfield">
		<div class="parent">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<div class="topheader">
					<h1><?php the_title(); ?></h1>
					<hr class="short-hr"/>

				</div>
				<?php
					the_post();
					$thispage=$post->ID;
				}
			} ?>
			
		</div>
		<div class="parent-content">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<?php
						echo '<div class="ingressteksten">';
						$ingressteksten = CFS()->get('ingress');
					    	if ($ingressteksten != '') {echo $ingressteksten;}
						echo '</div>';
					?>
				<?php
					$ingresstekst = $cfs->get('ingress_t');
					// echo '<p class="article-ingress">' . $ingresstekst . '</p>';
					// echo '<div class="ingress">' . 
					the_post();
					the_content();
					$thispage=$post->ID;
					// echo '</div>';
				}
			}
			?>
		</div>

					

		<!-- section -->
		<section>
			<article class="left-side">
				<div class="bg-l">
					
					<?php
						
						$left_col = $cfs->get('venstre_kolonne');
						echo '<div class="header-l"><h3>' . $left_col . '</h3></div>';
						$left_ingress_text = $cfs->get('ingress_tekst-l');
						echo '<div class="ingress-text">' . $left_ingress_text .'</div>';
						// returns an array of post IDs, which we need to iterate through
		    				$my_relationship = $cfs->get('relaterte_sider-l');
		    				
		    				if ( is_array($my_relationship) && in_array('', $my_relationship, true)){
		    					
		    					
		    				}
		    				else {
						    echo 
						    '<div class="l-relates">';
						    if ($my_relationship != ''){
						    foreach ($my_relationship as $post_idx) {
						        // Pass the post ID into get_the_title to get the post's title
						        echo '<div class="relaterte_sider"><a href="' . get_permalink($post_idx) . '">' . get_the_title($post_idx) . '</a></div>';
						    }
						    echo '</div>';
							}
						}
						
					?>
				</div>
			</article>

			<article class="right-side">
				<div class="bg-r">
					
					<?php
						//echo '<div class="divider"></div>';
						
						$right_col = $cfs->get('hyre_kolonne');
						echo '<div class="header-r"><h3>' . $right_col . '</h3></div>';
						$right_ingress_text = $cfs->get('ingress_tekst-r');
						echo '<div class="ingress-text">' . $right_ingress_text .'</div>';

						// returns an array of post IDs, which we need to iterate through
		    				$my_relationship_r = $cfs->get('relaterte_sider-r');
		    				//$the_post->post_permalink;
		    				// output the relationship values
		    				//var_dump($field['relaterte_sider']);
		    				if ( is_array($my_relationship) && in_array('', $my_relationship_r, true)){
		    					//echo Hey;
		    					
		    				}
		    				else {
						    echo 
						    '<div class="r-relates">';
						    if ($my_relationship_r != ''){
						    foreach ($my_relationship_r as $post_idx_r) {
						        // Pass the post ID into get_the_title to get the post's title
						        echo '<div class="relaterte_sider"><a href="' . get_permalink($post_idx_r) . '">' . get_the_title($post_idx_r) . '</a></div>';
						    }
						    echo '</div>';
							}
						}
						$right_help_text = $cfs->get('mer_hjelp_r');
						echo '<div class="hjelp">' . $right_help_text . '</div>';
						
					?>
				</div>
			</article>

		</section>
		<!-- /section -->
		
	</main>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery(".collapse").hide();
			//toggle the content
			jQuery(".child-header").click(function(){
				jQuery(this).next(".collapse").slideToggle(500);
				//jQuery(".child-content").siblings(".collapse").slideToggle(500);
			});
			jQuery(".child-header").click(function(){
				jQuery(this).next(".collapse_up").slideToggle(500);
				//jQuery(".child-content").siblings(".collapse").slideToggle(500);
			});

		});
	</script>
<script type="text/javascript">
	jQuery('.felt:contains("Spørsmål")').closest( ".child" ).addClass("spm");
	jQuery('.felt:contains("Svar")').closest( ".child" ).addClass("answr");
	jQuery('.felt:contains("Klagebrev")').closest( ".child" ).addClass("klgbrv");
	jQuery('.status_collapse:contains("Nei")').closest( ".toggle" ).removeClass("collapse").addClass("collapse_up");
</script>
	<div class="clear"></div>
	</div>
<?php get_footer(); ?>
