<?php /* Template name: Nivå 4 - Sjekkliste før kjøp */ get_header(); ?>
<?php 
	$url = $_SERVER["REQUEST_URI"];

	if(strpos($url, 'kjop-og-salg-av-bil/sjekkliste') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > <a href="/forside/bil/kjop-og-salg-av-bil"> Kjøp og salg av bil</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bil/reparasjon/sjekkliste') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > <a href="/forside/bil/reparasjon"> Reparasjon</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bil/parkeringsbot-2') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bil/billeie') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bil/kjoreskole-3') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/strom/') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/strom"> Strøm</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/flyttebyra') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/vannlevering-2') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'husleie/sjekkliste-husleie') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/husleie"> Husleie</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'husleie/depositum') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/husleie"> Husleie</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'husleie/vedlikehold') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/husleie"> Husleie</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'husleie/oppsigelse') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/husleie"> Husleie</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'husleie/utkastelse') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/husleie"> Husleie</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}	

	else if(strpos($url, 'bolig/kjop-og-salg-av-bolig/sjekkliste') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/kjop-og-salg-av-bolig"> Kjøp og salg av bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/kjop-og-salg-av-bolig/mangler') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/kjop-og-salg-av-bolig"> Kjøp og salg av bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/kjop-og-salg-av-bolig/misfornoyd') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/kjop-og-salg-av-bolig"> Kjøp og salg av bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/bygge/') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/bygge"> Bygge</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/bygge/') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/bygge"> Bygge</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/pusse-opp/sjekkliste') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/pusse-opp"> Pusse opp</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/pusse-opp/forsinket') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/pusse-opp"> Pusse opp</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'forside/okonomi-og-betaling/svindel') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'forside/okonomi-og-betaling/konkurs') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'forside/okonomi-og-betaling/kjop-pa-kredit') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'forside/okonomi-og-betaling/netthandel') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'forside/okonomi-og-betaling/betalingsproblemer') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'forside/okonomi-og-betaling/forsikring') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > <a href="/forside/okonomi-og-betaling/forsikring"> Forsikring</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'forside/okonomi-og-betaling/bank') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > <a href="/forside/okonomi-og-betaling/bank"> Banktjenester</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if (strpos($url, 'forside/digitalt/') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/digitalt/"> Digitalt</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'reise/taxi') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'reise/hotell') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'reise/pakkereise') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > <a href="/forside/reise/pakkereise/"> Pakkereise</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'reise/fly/sjekkliste') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > <a href="/forside/reise/fly/"> Fly</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if(strpos($url, 'forside/varer-og-tjenester/') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/varer-og-tjenester/"> Varer og tjenester</a> > '?><?php the_title(); ?><?php
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
					<h3><p>
						<?php
							$subheader = CFS()->get('subheader');
						    	if ($subheader != '') {echo $subheader;}
						?>
					</p></h3>
					
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
		</div>
		<!-- section -->
		<section class="hpunkt p-0-20">
		<?php
			
		?>
			<?php
				// Display everything within the "faq_section" loop
				//http://forbrukerradet.local/wp-content/themes/fr/
				//$templatepath = get_template_directory_uri();
				$fields = $cfs->get('hovedpunkt');
				foreach ($fields as $field) {
				    echo 
				    '
				    <div class="child">

					    <div class="child-header" data-toggle="collapse">
					    	<div class="child-header-icon"></div>
					    	<div id="openclose" class="archive-header-icon">
  								<div class="openclose"><span></span></div>
							</div>
					    ' 
					    .
						    '<h2>'
						    .
						    $field['header']
						    .
						    '</h2>'
					    . 
					    '
					    </div>
				    <div class="toggle collapse">
				    ';
				    foreach ($field['type'] as $kind) {
				    	echo '<div class="felt">' . $kind . '</div>';
				    }
				    foreach ($field['status_collapse'] as $status) {
				    	echo '<div class="status_collapse">' . $status . '</div>';
				    }
				    if ($field['avsnitt'] != ''){
					    foreach ($field['avsnitt'] as $question) {
					       if($question['brdtekst'] !=''){
						       	echo
						        '
							        <div class="r-col r-col-prior-purchase">
								        <div class="child-excerpt">' . $question['brdtekst'] . '</div>
								    </div>
							        
						        
						        ';
					    	}
					    	else {
					    		NULL;
					    	}
					    	
						}
					}
					
				    echo '</div></div>';

				}
			?>
				
		</section>
		<!-- /section -->
	</main>
</div>

<?php get_footer(); ?>
