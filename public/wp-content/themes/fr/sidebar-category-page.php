<!-- sidebar category page with related -->
<aside class="sidebar" role="complementary">
	<div class="has-info-widget">
		<?php
			global $wp_query;
				$postid = $wp_query->post->ID;
			wp_reset_query();
		?>

		<?php echo rwmb_meta( 'rw_wysiwyg' ); ?>

		<?php $urls = rwmb_meta( 'rw_url', 'type=checkbox_type' ); 

		if(!empty($urls)) {

		?>
		<div class="metalink"><h3>EKSTERNE LINKER</h3></div>
		<?php
			foreach ( $urls as $lenke ) {
				if (filter_var($lenke, FILTER_VALIDATE_URL) == true) {
					echo "<a target=_blank href=" . $lenke . ">" . $lenke . "</a></br>";
				} else {
					echo $lenke;
				}
			}
		?>
		<?php 
		}
		?>

		<?php $files = rwmb_meta( 'rw_file', 'type=file' );
		if(!empty($files)) {
			foreach ( $files as $info )
			{
			    echo "<a href='{$info['url']}' title='{$info['title']}'>{$info['title']}</a><br />";
			}
		}
		?>
		

		<?php $files = rwmb_meta( 'rw_file_advanced', 'type=file_advanced' );
		if(!empty($files)){

		?>
		<div class="metafiler"><h3>FILER</h3></div>
		<?php	
		foreach ( $files as $info )
			{
			    echo "<a href='{$info['url']}' title='{$info['title']}'>{$info['title']}</a><br />";
			}
		?>
		<?php 
		}
		?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

</aside>
<!-- /sidebar -->