<!-- sidebar -->
<aside class="sidebar" role="complementary">

	

	<div class="has-info-widget">
		
		<?php echo rwmb_meta( 'rw_wysiwyg' ); ?>
		
		<?php $urls = rwmb_meta( 'rw_url', 'type=checkbox_type' ); 
			foreach ( $urls as $lenke ) {
				if (filter_var($lenke, FILTER_VALIDATE_URL) == true) {
					echo "<a target=_blank href=" . $lenke . ">" . $lenke . "</a></br>";
				} else {
					echo $lenke;
				}
			}
		?>

		<?php $files = rwmb_meta( 'rw_file', 'type=file' );
			foreach ( $files as $info )
			{
			    echo "<a href='{$info['url']}' title='{$info['title']}'>{$info['name']}</a><br />";
			}
		?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

</aside>
<!-- /sidebar -->
