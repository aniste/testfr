jQuery(document).ready(function(){

	/* Enable stopPropagation in IE < 9 */



	jQuery(".menubutton").click(function(){
		// event.stopPropagation();

		if (event && event.stopPropagation) { 
		event.stopPropagation(); 
		} 
		else if (window.event) { 
			window.event.cancelBubble = true; 
		}

		jQuery(this).toggleClass("clicked");
	});
	jQuery('html').click(function() {
		jQuery(this).find(".menubutton").removeClass("clicked");
	});
});


