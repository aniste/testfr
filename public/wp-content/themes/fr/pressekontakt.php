<?php
$values = CFS()->get('kontakt');
	if ($values != ''){
		foreach ($values as $post_id) {
			echo '<div class="ansatt">'; 
			$pressebilde = $cfs->get('ansattbilde', $post_id);
			echo '<div class="bilde">' . wp_get_attachment_image( $pressebilde, 'medium' ) . '</div>';
			echo '<div class="navn">' . get_the_title( $post_id ) . '</div>';
			$stilling = $cfs->get('stilling', $post_id);
			echo '<div class="stilling">' . $stilling . '</div>';
			$telefon = $cfs->get('telefon', $post_id);
			echo '<div class="telefon">' . $telefon . '</div>';
			$epost = $cfs->get('epost', $post_id);
			echo '<div class="epost">' . $epost . '</div>';
			echo '</div>';
		}
	}
?>