<?php /* Template name: Forside Nivå 1 */ get_header(); ?>
	<main>
		<div class="parent">
			<div class="headerimage"></div>
		<div class="frontpage-nav-wrapper">
			<div class="column" id="left">
				<div class="top">
					<h4 class="list">Vi hjelper deg</h4>
					<div class="arrow-down"></div>
				</div>
				<div>
					<div id="vihjelperdeg">
						<ul class="hjelp">
					      <a href="/forside/angrer-du-pa-et-kjop/"><li class="knapp"><h4>Angrer du på et kjøp?</h4></li></a>
					      <a href="/forside/feil-ved-vare/"><li class="knapp"><h4>Grunn til &aring; klage?</h4></li></a>
					      <a href="/klageguide/"><li class="knapp"><h4>Slik klager du</h4></li></a>
					      <a href="/forside/kontrakter/"><li class="knapp"><h4>Kontrakter</h4></li></a>
					 	</ul>
					</div>
				</div>
			</div>
			<div class="column" id="right">
				<div class="top">
				<h4 class="list">V&aring;re tips og r&aring;d</h4>
					<div class="arrow-down"></div>
				</div>
				<div id="tipsograd">
					<ul class="tips">
						<a href="/forside/bil/" class="small-knapp"><li class="small-knapp"><h5>Bil</h5></li></a>
					    <a href="/forside/bolig/" class="small-knapp"><li class="small-knapp"><h5>Bolig</h5></li></a>
					    <a href="/forside/okonomi-og-betaling/" class="large-knapp"><li class="large-knapp"><h5>Økonomi og betaling</h5></li></a>
					    <a href="/forside/reise/" class="small-knapp"><li class="small-knapp"><h5>Reise</h5></li></a>
					    <a href="/forside/digitalt/" class="small-knapp"><li class="small-knapp"><h5>Digitalt</h5></li></a>
					    <a href="/forside/varer-og-tjenester/" class="large-knapp"><li class="large-knapp"><h5>Andre varer og tjenester</h5></li></a>
					</ul>
				</div>
			</div>
		</div>
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
					@media screen and (max-width: 768px){
									    .headerimage {
									    	height: 250px !important;
									        background-image:url('<?php echo site_url(); ?>/wp-content/uploads/2015/10/forside_graskjerm_mobile.jpg');
										}
					}

					@media screen and (max-width: 1025px){
									    .headerimage {
									    	display: block !important;
										}
					}
			  </style>

			 <?php
			}//end if

			?>


			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>

				<?php
					the_post();
					$thispage=$post->ID;
				}
			} ?>
		</div>
		<div class="parent-content">
			<div class="related box-40">

				<div class="main">
					<div class="thirds-container">
						<div class="thirds">
							<?php
								$frontpage_article_one = $cfs->get('forsideartikkel_1');
								if ($frontpage_article_one != '') {
									echo $frontpage_article_one;
								}
							?>
						</div>
						<div class="thirds">
							<?php
								$frontpage_article_two = $cfs->get('forsideartikkel_2');
								if ($frontpage_article_two != '') {
									echo $frontpage_article_two;
								}
							?>
						</div>
						<div class="thirds">
							<?php
								$frontpage_article_three = $cfs->get('forsideartikkel_3');
								if ($frontpage_article_three != '') {
									echo $frontpage_article_three;
								}
							?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		<div class="thirds-container full">
			<div class="full fpvimener box-40">
				<div class="top">
					<h4 class="list">Forbrukerpolitikk</h4>
					<div class="arrow-down"></div>
				</div>
				<div class="buble">
				<?php
					$quote_bolig = $cfs->get('snakkeboble_bolig');
					$quote_digital = $cfs->get('snakkeboble_digital');
					$quote_finans = $cfs->get('snakkeboble_finans');
					$quote_offentlighelse = $cfs->get('snakkeboble_offentlighelse');
					$quote_mat_produkt_handel = $cfs->get('snakkeboble_mat_produktsikkerhet_og_handel');
				?>
					<div class="fr_bg_container">
						<svg version="1.1" id="fr_bg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 943.1 382.5" enable-background="new 0 0 943.1 382.5" xml:space="preserve">
							<path fill="#FFFFFF" d="M371.2,7.1H222.1h-11.3h-5.3C165.2,7.1,44,41.6,42.3,42c-12.9,3.5-22.6,15.2-22.6,29.3
								c0,5.2,1.3,10.2,3.7,14.4l3.5,6.5l153.1,283c1,1.9,3,3,5,3c0.5,0,1,0,1.4-0.2c2.6-0.6,4.4-2.9,4.4-5.6V263.4h180.3
								c7.7,0,14-6.3,14-14V21.1C385.2,13.4,378.9,7.1,371.2,7.1z"/>
						</svg>
					</div>

					<ul class="quotes">
						<li class="bolig" style="display:block;"> <?php echo $quote_bolig ?> </li>
					</ul>

				</div>
				<ul class="forbrukerpolitikk">
					<a href="/forside/fpa-bolig/"><li class="knapp boligknapp"><h4>Bolig</h4></li></a>
					<a href="/forside/fpa-digital/"><li class="knapp finans"><h4>Digital</h4></li></a>
					<a href="/forside/fpa-finans/"><li class="knapp finans"><h4>Finans</h4></li></a>
					<a href="/forside/fpa-offentlig-og-helse/"><li class="knapp offentlig"><h4>Offentlig og helse</h4></li></a>
					<a href="/forside/fpa-mat-produktsikkerhet-og-handel/"><li class="knapp produktsikkerhet"><h4>Mat og handel</h4></li></a>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="full varenettsteder box-40">
				<div class="top">
					<h4 class="list">V&aring;re nettsteder</h4>
					<div class="arrow-down"></div>
				</div>
				<ul>
					<a class="large-knapp" href="http://hvakostertannlegen.no" target="_blank"><li class="large-knapp"><h4>Hvakostertannlegen.no</h4></li></a>
					<a class="large-knapp" href="http://finansportalen.no" target="_blank"><li class="large-knapp"><h4>Finansportalen.no</h4></li></a>
					<a class="large-knapp" href="http://www.strompris.no/" target="_blank"><li class="large-knapp"><h4>Str&oslash;mpris.no</h4></li></a>
				</ul>
			</div>
			<div class="sealletester box-40">
				<ul>
					<a class="large-knapp" href="/forside/vi-undersoker"><li class="large-knapp"><h4>Se alle v&aring;re tester, unders&oslash;kelser og guider</h4></li></a>
				</ul>
			</div>
		</div>
		</div>
		<div class="clear"></div>
	</main>
	</div>
	<div class="clear"></div>
	<?php get_footer(); ?>
