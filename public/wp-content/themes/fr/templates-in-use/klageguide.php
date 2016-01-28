<?php /* Template name: Nivå 4 - Klageguide */ get_header(); ?>
<div class="C_breadcrumb p-0-20">
	<a href="/">Forside</a> > <?php the_title(); ?>	
</div>
	<main role="main">
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
					echo '<div class="ingressteksten ingresscenter"><p>';
					$ingressteksten = CFS()->get('ingress');
				    	if ($ingressteksten != '') {echo $ingressteksten;}
					echo '</p></div>';
					the_content();
					$thispage=$post->ID;
				}
			} 

			?>
			<div class="klagesteps">
				<a href="#s_1" class="stegikon1">
					<div class="klagestep">
						<svg version="1.1" class="normal" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
							viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve"> 
							<g> 
								<polygon opacity="0.2" fill="none" stroke="#004957" stroke-width="6.35" stroke-miterlimit="10" points="466,464 37.5,464 
								37.5,36 466,36 466,208.6 495.4,251 466,291.4 "/> 
								<rect x="0" y="84.2" fill="none" width="500" height="143.6"/> 
								<text transform="matrix(1 0 0 1 208.4721 185.8031)" font-family="'FFClanWebBook'" font-size="126.9991px">1</text> 
								<line fill="none" stroke="#38CED5" stroke-width="6.35" stroke-miterlimit="10" x1="213.5" y1="240.5" x2="292.9" y2="240.5"/> 
								<rect x="43.5" y="287.5" fill="none" width="419.4" height="78.9"/> 
								<text transform="matrix(1 0 0 1 146.0693 312.5638)" font-family="'FFClanWebMedium'" font-size="31.7498px">Klag til selger</text> 
							</g> 
						</svg>
						<svg version="1.1" class="over" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
						viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve"> 
							<g> 
								<polygon opacity="0.2" fill="#004957" points="466,464 37.5,464 37.5,36 466,36 466,208.6 495.4,251 466,291.4 "/> 
								<rect y="84.2" fill="none" width="500" height="143.6"/> 
								<text transform="matrix(1 0 0 1 208.4717 185.8031)" font-family="'FFClanWebBook'" font-size="126.9991px">1</text> 
								<line fill="none" stroke="#FFFFFF" stroke-width="6.35" stroke-miterlimit="10" x1="213.5" y1="240.5" x2="292.9" y2="240.5"/> 
								<rect x="43.5" y="287.5" fill="none" width="419.4" height="78.9"/> 
								<text transform="matrix(1 0 0 1 146.0684 312.5638)" font-family="'FFClanWebMedium'" font-size="31.7498px">Klag til selger</text> 
							</g> 
						</svg> 

					</div>
				</a>
				<a href="#s_2" class="stegikon2">
					<div class="klagestep">
						<svg version="1.1" class="normal" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
						viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve"> 
							<g> 
							<polygon opacity="0.2" fill="none" stroke="#004957" stroke-width="6.35" stroke-miterlimit="10" points="462,464 33.5,464 
							33.5,36 462,36 462,208.6 491.4,251 462,291.4 "/> 
								<rect y="84.2" fill="none" width="500" height="143.6"/> 
								<text transform="matrix(1 0 0 1 208.4721 185.8032)" font-family="'FFClanWebBook'" font-size="126.9991px">2</text> 
								<line fill="none" stroke="#38CED5" stroke-width="6.35" stroke-miterlimit="10" x1="209.5" y1="240.5" x2="288.9" y2="240.5"/> 
								<rect x="39.5" y="287.5" fill="none" width="419.4" height="78.9"/> 
								<text transform="matrix(1 0 0 1 68.2377 312.5645)"><tspan x="0" y="0" font-family="'FFClanWebMedium'" font-size="31.7498px">Klag til Forbrukerrådet </tspan><tspan x="45.3" y="42.9" font-family="'FFClanWebMedium'" font-size="31.7498px">eller klagenemnd</tspan></text> 
							</g> 
						</svg>
						<svg version="1.1" class="over" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
						viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve"> 
							<g> 
								<polygon opacity="0.2" fill="#004957" points="462,464 33.5,464 33.5,36 462,36 462,208.6 491.4,251 462,291.4 "/> 
								<rect y="84.2" fill="none" width="500" height="143.6"/> 
								<text transform="matrix(1 0 0 1 208.4717 185.8032)" font-family="'FFClanWebBook'" font-size="126.9991px">2</text> 
								<line fill="none" stroke="#FFFFFF" stroke-width="6.35" stroke-miterlimit="10" x1="209.5" y1="240.5" x2="288.9" y2="240.5"/> 
								<rect x="39.5" y="287.5" fill="none" width="419.4" height="78.9"/> 
								<text transform="matrix(1 0 0 1 68.2383 312.5645)"><tspan x="0" y="0" font-family="'FFClanWebMedium'" font-size="31.7498px">Klag til Forbrukerrådet </tspan><tspan x="45.3" y="42.9" font-family="'FFClanWebMedium'" font-size="31.7498px">eller klagenemnd</tspan></text> 
							</g> 
						</svg>
					</div>
				</a>
				<a href="#s_3" class="stegikon3">
					<div class="klagestep">
						<svg version="1.1" class="normal" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
						viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve"> 
							<g> 
								<polygon opacity="0.2" fill="none" stroke="#004957" stroke-width="6.35" stroke-miterlimit="10" points="462,464 33.5,464 
								33.5,36 462,36 462,208.6 491.4,251 462,291.4 "/> 
								<rect y="84.2" fill="none" width="500" height="143.6"/> 
								<text transform="matrix(1 0 0 1 208.4716 185.8024)" font-family="'FFClanWebBook'" font-size="126.9991px">3</text> 
								<line fill="none" stroke="#38CED5" stroke-width="6.35" stroke-miterlimit="10" x1="209.5" y1="240.5" x2="288.9" y2="240.5"/> 
								<rect x="39.5" y="287.5" fill="none" width="419.4" height="78.9"/> 
								<text transform="matrix(1 0 0 1 194.0761 312.5641)"><tspan x="0" y="0" font-family="'FFClanWebMedium'" font-size="31.7498px">Klag til </tspan><tspan x="-125.2" y="42.9" font-family="'FFClanWebMedium'" font-size="31.7498px">Forbrukertvistutvalget</tspan></text> 
							</g>
						</svg>
						<svg version="1.1" class="over" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
						viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve"> 
							<g> 
								<polygon opacity="0.2" fill="#004957" points="462,464 33.5,464 33.5,36 462,36 462,208.6 491.4,251 462,291.4 "/> 
								<rect y="84.2" fill="none" width="500" height="143.6"/> 
								<text transform="matrix(1 0 0 1 208.4717 185.8033)" font-family="'FFClanWebBook'" font-size="126.9991px">3</text> 
								<line fill="none" stroke="#FFFFFF" stroke-width="6.35" stroke-miterlimit="10" x1="209.5" y1="240.5" x2="288.9" y2="240.5"/> 
								<rect x="39.5" y="287.5" fill="none" width="419.4" height="78.9"/> 
								<text transform="matrix(1 0 0 1 194.0762 312.5641)"><tspan x="0" y="0" font-family="'FFClanWebMedium'" font-size="31.7498px">Klag til </tspan><tspan x="-125.2" y="42.9" font-family="'FFClanWebMedium'" font-size="31.7498px">Forbrukertvistutvalget</tspan></text> 
							</g> 
						</svg>
					</div>
				</a>
			</div>
			<div class="clear"></div>
		</div>

	</main>


		<!-- section -->
		<section class="klageguide">
			<?php 
				$fields = $cfs->get('steg');
				foreach ($fields as $field) {
				    echo '<div class="step"><div class="step-info">' . $field['steg_navn'] . '</div><div class="arrow"></div></div>';
				    echo '<main class="main-container p-0-20">';

				foreach ($field['hovedpunkt_klage'] as $hovedpunkt) {
					echo
					'<div class="child">
					    <div class="child-header" data-toggle="collapse">
					    	<div class="child-header-icon"></div>
					    	<div id="openclose" class="archive-header-icon"><div class="openclose"></div></div>' 
					    .
						    '<h2>' . $hovedpunkt['header_klage'] . '</h2>'
					    . '</div>
				    	<div class="toggle collapse">';

						foreach ($hovedpunkt['type_klage'] as $kind) {
				    		echo '<div class="felt">' . $kind . '</div>';
					    }

					    foreach ($hovedpunkt['status_collapse_klage'] as $status) {
					    	echo '<div class="status_collapse">' . $status . '</div>';
					    }

						if ($hovedpunkt['avsnitt_klage'] != ''){
						    foreach ($hovedpunkt['avsnitt_klage'] as $question) {
							    echo
						        '
						        <div class="child-content">
							        <div class="l-col">
								        <h3>'.$question['sub_header_klage'].'</h3>
							        </div>
						        ';
						       		echo
						        	'
							        <div class="r-col r-col-prior-purchase">
								        <div class="child-excerpt">
								        ' . $question['brdtekst_klage'] . '
										</div>
									 </div>
						        </div>
						        ';
						    }   
						}
					echo '</div></div>';
				}
   			 echo '</main>';		    
		}		
	?>
</section>
<!-- /section -->
<div class="related">

</div>
</div>
<?php get_footer(); ?>
