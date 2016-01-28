jQuery(function(){
	jQuery('table').each(function(){
		var text = []
		jQuery(this).find('thead tr th').each(function(){
			text.push(jQuery(this).text())

			for (var i = 0; i < text.length; i++) {
				jQuery(this).parents('table').find('tbody tr td:nth-of-type(' + (i + 1) +')').attr('data-th', text[i])
			}	
		});
	});
});
