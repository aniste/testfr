<?php
	$faktaboks = $cfs->get('faktaboks');
	$bokstittel = $cfs->get('bokstittel');
	if ($faktaboks != '') {
		echo '<div class="faktaboks">';
			if ($bokstittel != '') {
				echo '<h3 id="tittel">';
			echo $bokstittel . '</h3>
			<hr class="fakta"/>';
			}
			
			echo $faktaboks . 
			'</div>';
	}
?>
