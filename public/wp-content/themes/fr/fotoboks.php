<?php
	$fotoboks = $cfs->get('ekstra_fotoboks');
	$fotobokstittel = $cfs->get('fotobokstittel');
	if ($fotoboks != '') {
		echo '<div class="faktaboks foto">';
			if ($fotobokstittel != '') {
				echo '<h3 id="tittel">';
			echo $fotobokstittel . '</h3>
			<hr class="fakta"/>';
			}
			
			echo $fotoboks . 
			'</div>';
	}
?>