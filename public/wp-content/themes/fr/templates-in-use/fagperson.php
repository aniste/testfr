<?php
	$values = CFS()->get('kontakt');
	if ($values != '') {
?>
	<section class="fagpersoner">
		<div class="fagpersoner-container p-0-20">
			<h3>Fagpersoner</h3>
			<?php
			$pkontakt = CFS()->get('kontakt');
				if ($pkontakt != ''){
					foreach ($pkontakt as $post_id) {
						echo '<div class="ansatt">'; 
						$pressebilde = $cfs->get('ansattbilde', $post_id);
						echo '<div class="bilde">' . wp_get_attachment_image( $pressebilde, 'large' ) . '</div>';
						echo '<div class="navn">' . get_the_title( $post_id ) . '</div>';
						$stilling = trim($cfs->get('stilling', $post_id));
						echo '<div class="stilling">' . ($stilling ? $stilling : '&nbsp;') . '</div>';
						$telefon = trim($cfs->get('telefon', $post_id));
						echo '<div class="telefon">' . ($telefon ? $telefon : '&nbsp;') . '</div>';
						$epost = trim($cfs->get('epost', $post_id));
						echo '<div class="epost hyphenate">' . ($epost ? $epost : '&nbsp;'). '</div>';
						
						echo '</div>';
					}
				}
			?>
		</div>
	</section>
<?php 
	}
	else {
		NULL;
	}
?>
