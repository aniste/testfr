<?php /* Template name: Nivå 4 - Etter kjøp*/ get_header(); ?>
<?php 
	$url = $_SERVER["REQUEST_URI"];

	if(strpos($url, 'forside/varer-og-tjenester/') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/varer-og-tjenester/"> Varer og tjenester</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'kjop-og-salg-av-bil/misfornoyd-med-kjop') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > <a href="/forside/bil/kjop-og-salg-av-bil/"> Kjøp og salg av bil</a> >'?><?php the_title(); ?><?php
	echo '</div>';

	}

	if(strpos($url, 'bil/reparasjon/misfornoyd') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bil/"> Bil</a> > <a href="/forside/bil/reparasjon"> Reparasjon</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/husleie/husleie') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/husleie"> Leie av bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}	


	else if(strpos($url, 'bolig/kjop-og-salg-av-bolig/mangler-nybygg') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig/"> Bolig</a> > <a href="/forside/bolig/kjop-og-salg-av-bolig"> Kjøp og salg av bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/kjop-og-salg-av-bolig/sjekkliste-selge-selv') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/kjop-og-salg-av-bolig"> Kjøp og salg av bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/pusse-opp/misfornoyd') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > <a href="/forside/bolig/pusse-opp"> Pusse opp</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if(strpos($url, 'bolig/borettslag-og-sameie') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/bolig"> Bolig</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if (strpos($url, 'reise/buss') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'reise/fly') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > <a href="/forside/reise/fly"> Fly</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}
	

	else if (strpos($url, 'reise/pakkereise') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > <a href="/forside/reise/pakkereise/"> Pakkereise</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'forside/feil-ved-vare') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	if(strpos($url, 'forside/okonomi-og-betaling/inkasso-2') == true){

   	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/okonomi-og-betaling/"> Økonomi og betaling</a> > '?><?php the_title(); ?><?php
	echo '</div>';
	}

	else if (strpos($url, 'reise/tog-2') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > <a href="/forside/reise/"> Reise</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else if (strpos($url, 'angrer-du-pa-et-kjop') == true){

	echo '<div class="C_breadcrumb p-0-20">
		<a href="/">Forside</a> > '?><?php the_title(); ?><?php
	echo '</div>';

	}

	else {
	}
?>
	<main class="contentfield">
		<div class="parent">
		<div class="frontpage-nav-wrapper">
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
					$thispage=$post->ID;
				}
			}
			?>
		</div>
		</div>
		<!-- section -->
		<section class="fly p-0-20">
			<?php
				
				$fields = $cfs->get('hovedpunkt');
				if($fields != '') {
				foreach ($fields as $field) {
				    echo 
				    '<div class="child">
					    <div class="child-header" data-toggle="collapse">
					    	<div class="child-header-icon"></div>
					    	<div id="openclose" class="archive-header-icon"><div class="openclose"></div></div>'
					    .
						'<h2>' . $field['header'] . '</h2>' . '</div> <div class="toggle collapse">';
				    foreach ($field['type'] as $kind) {
				    	echo '<div class="felt">' . $kind . '</div>';
				    }
				    foreach ($field['status_collapse'] as $status) {
				    	echo '<div class="status_collapse">' . $status . '</div>';
				    }
				    if ($field['avsnitt'] != ''){
					    foreach ($field['avsnitt'] as $question) {
					    	if($question['brdtekst'] != ''){
					    		
					        echo
					        '
					        <div class="child-content">
						        <div class="l-col">
							        <h3>'.$question['sub_header'].'</h3>
						        </div>
					        ';
					        echo
					        '
						        <div class="r-col">
							        <div class="child-excerpt">
							        '
							        .
							        $question['brdtekst']
							        .
							        '
							        </div>
						        </div>
						        </div>';
					    	}
					   	}
					}
    				$my_relationship = $field['relaterte_sider'];
    				if (in_array('', $my_relationship, true)){
    				
    				}
    				else {
				    echo '<div class="l-relates"></div><div class="r-relates">';
				    if ($field['relaterte_sider'] != ''){
					    foreach ($my_relationship as $post_idx) {
					    	echo ($field['overskrift_kategori']);

					        echo '<div class="relaterte_sider"><a href="' . get_permalink($post_idx) . '">' . get_the_title($post_idx) . '</a></div>';
					    }
					    echo '</div>';
					}
				}
				
				    echo '</div></div>';
				}
			};
			?>
		</section>
		<!-- form end -->
		<div class="clear"></div>
		<!-- /section -->
		</div>
	</main>
<?php get_footer(); ?>
