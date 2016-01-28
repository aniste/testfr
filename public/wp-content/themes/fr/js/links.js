jQuery(document).ready( function() {
	
		jQuery('.parent-content p a').each(function(index, value) {

			if(jQuery(this).parent().is('.blue_button, .green_button, .black_button, .white_button')) {
			    console.log("test")
			}
				
			else {
				var str = value.toString();

				if (str.indexOf("forbrukerradet.no") > -1) {
					jQuery(this).addClass("");
				} else {
					jQuery(this).addClass("");
				}
			};
		});
});
