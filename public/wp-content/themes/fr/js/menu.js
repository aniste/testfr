jQuery(document).ready(function(){

	jQuery(".menubutton").click(function(event){
		event.stopPropagation();

		jQuery(this).toggleClass("clicked");
	});
	jQuery('html').click(function() {
		jQuery(this).find(".menubutton").removeClass("clicked");
	});
});


