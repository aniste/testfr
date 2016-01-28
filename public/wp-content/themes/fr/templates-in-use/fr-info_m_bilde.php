<?php /* Template name: FBR info med bilde*/ get_header(); ?>

<main role="main">
		<div class="parent">
			<div class="headerimage"></div>
			<div class="frontpage-nav-wrapper">
			<?php

				if (has_post_thumbnail()) { //if a thumbnail has been set

				$imgID = get_post_thumbnail_id($post->ID); //get the id of the featured image
				$featuredImage = cl_wp_get_attachment_image_src($imgID, 'full' );//get the url of the featured image (returns an array)
				$imgURL = $featuredImage[0]; //get the url of the image out of the array

				?>
				<style type="text/css">
				    .headerimage {
				        background-image:url('<?php echo $imgURL ?>');
					}
			    </style>

			 <?php
			}//end if

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
		<div class="parent-content">
		
		<?php
			echo '<div class="ingressteksten">';
			$ingressteksten = CFS()->get('ingress');
		    	if ($ingressteksten != '') {echo $ingressteksten;}
			echo '</div>';
		?>
		
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
				
			?>
			
			</section>
			<section class="article-column">
			<?php
				include 'faktaboks.php';
			?>
			</section>
			<div class="clear"></div>
			<div class="add om_oss_add">
			<?php
				$tilleggsinformasjon = $cfs->get('innhold');
				if ($tilleggsinformasjon != '') {
					echo '<div class="wig-content">' . $tilleggsinformasjon . '</div>';
				}
				?>
			</div>
		</div>		
	</main>
	<div class="related additionals">
		<div class="head-container"></div>
		<main>
		<?php
			$additionals = $cfs->get('additionals');
			if ($additionals != '') {
				echo $additionals;
			}
		?>
		</main>
	</div>
	</div>
	</div>
<?php get_footer(); ?>
