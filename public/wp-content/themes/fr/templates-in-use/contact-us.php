<?php /* Template name: Contact us*/ get_header(); ?>
	<main role="main" class="contentfield wp-content">
		<div class="parent">
			<?php if ( have_posts() ) {
				while ( have_posts() ) { ?>
				<div class="topheader">
					<h1><?php the_title(); ?></h1>
					<h3><?php the_excerpt(); ?></h3>

				</div>
				<?php
					the_post();
					$thispage=$post->ID;
				}
			} ?>

		</div>
		<div class="parent-container">
			<div class="parent-content">
				<?php if ( have_posts() ) {
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
			</div>
		</div>
		<!-- section -->

		<div class="clear"></div>
		<!-- /section -->

	</main>
	<?php
		$infoboks = CFS()->get('infoboks');
	    	if ($infoboks != '') {
	    		foreach ($infoboks as $boks) {
					echo '<main role="main" class="contentfield infoboks">';
		    			echo '<div class="infoboks-container"><div class="left-col">
			    				<h3>' . $boks['overskrift'] . '</h3> <hr class="short-hr"/>
			    				<div class="l-infotekst">' . $boks['venstre_kolonne'] . '</div>
			    			</div>';
		    			echo '<div class="right-col">' . $boks['hyre_kolonne'] . '</div>';
		    		echo '<div class="clear"></div></div></main>';
	    		}

	    	}
	?>
	<main role="main" class="contentfield kart">

		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script>
		  function initialize() {
		    var myLatlng = new google.maps.LatLng(<?php echo $cfs->get('kart'); ?>);
		    var mapOptions = {
		      zoom: 16,
		      center: myLatlng,
		      mapTypeId: google.maps.MapTypeId.ROADMAP,
		      disableDefaultUI: true,
		      scrollwheel: false,
		      navigationControl: false,
		      mapTypeControl: false,
		      scaleControl: false,
		      draggable: false,
		    }
		    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		    var image = 'http://forbrukerradet.local/wp-content/themes/fr/img/icons/map-fr-icon.svg';
		    var marker = new google.maps.Marker({
		        position: myLatlng,
		        map: map,
		        // icon: image,
		        title: 'Forbrukerrådet'
		    });

		  }

		  window.onload =  initialize;
		</script>

		<div id="map-canvas"></div>
	</main>
	<main role="main" class="contentfield">
		<div class="office">
			<?php
				$innhold = CFS()->get('innhold');
			    	if ($innhold != '') {
			    		echo '<p class="article-ingress">' . $innhold . '</p>';
			    	}
			?>
		</div>
		<div class="clear"></div>
	</main>
	<main role="main" class="contentfield wp-ansatte">
		<div class="employees">
			<h3>Staff</h3>
			<section class="pressebilder">
				<?php $loop = $cfs->get('pressebilder');
				foreach ($loop as $field) { ?>
				<div class="dropdown">
				    <div class="dropdown-header" data-toggle="collapse">
				    	<div class="mainheader-icon"></div>
						<h5><?php echo $field['navn_p_stilling'] ?></h5>
				    </div>
				    <div class="dropdown-collapse">
				    	<div class="dropdown-child-excerpt">
							 <div class="child-container">
								<?php $my_relationship = $field['person'];
								foreach ($my_relationship as $post_id) {
							    	$all_fields = $cfs->get(false, $post_id);
							    	if ($all_fields != '') { ?>
									    <div class="image-no-info">
								        	<div class="images">
								       			<div class="image">
								       				<a href="<?php echo wp_get_attachment_url($all_fields['ansattbilde']) ?>"><?php echo wp_get_attachment_image( $all_fields['ansattbilde'], 'large' ) ?></a>
								       			</div>
								    		</div>
								        	<div class="ansatt-info">
									        	<div class="ansatt-navn ansatt-data"><?php echo get_the_title($post_id) ?></div>
									        	<div class="ansatt-stilling ansatt-data"><?php echo $all_fields['stilling'] ?></div>
									        	<div class="ansatt-telefon ansatt-data"><?php echo $all_fields['telefon'] ?></div>
									        	<div class="ansatt-epost ansatt-data"><?php echo $all_fields['epost'] ?></div>
									        	<a href="<?php echo wp_get_attachment_url($all_fields['ansattbilde'])?>">Last ned pressebilde</a>
									        </div>
								     	</div>
								   	<?php } ?>
								<?php } ?>
							    <div class="clear"></div>
							 </div>
				    	</div>
			    	</div>
			    </div>
			    <?php } ?>
			</section>
		</div>
		<div class="clear"></div>
		</div>
		<?php get_footer(); ?>
	</main>
