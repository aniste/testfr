<?php
	$loop = new WP_Query();
	while ( $loop->have_posts() ) : $loop->the_post();?>
	
	<?php endwhile;
	wp_reset_query(); 
?>
<?php
	$r_lat = CFS()->get('relaterte_saker');
	if ($r_lat != '') {
?>
	<div class="omrade">
		<div class="head-container"><h3 class="head p-0-20">Verdt &aring; f&aring; med seg</h3></div>
		<div class="main p-0-20">
			<div class="thirds-container">
			<?php
			$used_post_id = array();

			$values = CFS()->get('relaterte_saker');
			if ($values != ''){
					foreach ($values as $post_id) {
						echo '<div class="thirds">';
						echo '<a href="' . get_permalink($post_id) . '">';
							$relatertbilde = $cfs->get('artikkelbilde', $post_id);
							$image = wp_get_attachment_url( get_post_thumbnail_id($post_id));
							echo '<img class="thirds" src="' . $image . '" />';
							echo '<h4>' . get_the_title( $post_id ) . '</h4>';
						echo '</a></div>';

						
						array_push($used_post_id, $post_id);
					}
				}
			?>
		</div>
	</div>

<?php 
	}
	else {
		NULL;
	}
?>
