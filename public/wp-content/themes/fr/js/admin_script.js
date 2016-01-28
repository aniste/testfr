//Hide all input fields until after type of post is chosen
jQuery(document).ready(function() {
	if (jQuery(".field-velg_type_post select.select").val() == '9') {
	jQuery( ".field-kommunikasjonsperson" ).hide();
		        jQuery( ".field-postbilde" ).hide();
		        jQuery( ".field-talsperson").hide();
		        jQuery( ".field-relaterte_saker").hide();
		        jQuery( ".field-ingresstekst").hide();
		        jQuery( ".field-innhold").hide();
		        console.log("loaded");
	};
});

// Function for showing/hiding the fields based on made choice
jQuery(document).ready(function() {

jQuery(".field-velg_type_post select.select").on( 'change', function() {
		// jQuery('.velg_type_artikkel select.select').each(function(){
		    if(jQuery(this).val() == '9') {
		        // console.log(jQuery(this).val());
		        // jQuery(".inside").toggleClass('active');
		        jQuery( ".field-kommunikasjonsperson" ).hide();
		        jQuery( ".field-postbilde" ).hide();
		        jQuery( ".field-talsperson").hide();
		        jQuery( ".field-relaterte_saker").hide();
		        jQuery( ".field-ingresstekst").hide();
		        jQuery( ".field-innhold").hide();
		    }
		    if(jQuery(this).val() == '1') {
		        // console.log(jQuery(this).val());
		        // jQuery(".inside").toggleClass('active');
		        jQuery( ".field-postbilde" ).hide();
		        jQuery( ".field-talsperson").hide();
		        jQuery( ".field-kommunikasjonsperson" ).show();
		        jQuery( ".field-relaterte_saker").hide();
		        jQuery( ".field-ingresstekst").show();
		        jQuery( ".field-innhold").show();
		    }

		    if(jQuery(this).val() == '2') {
		        // console.log(jQuery(this).val());
		        // jQuery(".inside").toggleClass('active');
		        
		        jQuery( ".field-postbilde" ).show();
		        jQuery( ".field-talsperson").show();
		        jQuery( ".field-kommunikasjonsperson" ).hide();
		        jQuery( ".field-relaterte_saker").show();
		        jQuery( ".field-ingresstekst").show();
		        jQuery( ".field-innhold").show();
		    }
		    
		// });
});

});

