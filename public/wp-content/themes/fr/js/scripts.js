(function ($, root, undefined) {

	$(function () {

		'use strict';

		// DOM ready, take it away

	});

})(jQuery, this);

jQuery(document).ready(function() {
  jQuery(".dropdown-collapse").hide();
  //toggle the content
  jQuery(".dropdown-header").click(function(){
    jQuery(this).next(".dropdown-collapse").slideToggle(500);
    jQuery(this).toggleClass("utvidet");

  });
});


jQuery(document).ready(function() {
	jQuery(".subcontent").hide();
	//toggle the content
	jQuery(".subheader").click(function(){
		jQuery(this).next(".subcontent").slideToggle(500);
		jQuery(this).toggleClass("utvidet");

	});
});

// Makes search icon clickable
jQuery(document).ready(function() {
    jQuery("#search-form-submit").click( function() {
        jQuery("#fbr-searchform").submit();
    });
});

// Add .hyphenate to H4 if screen is narrower than 1025
jQuery(document).ready(function() {
	jQuery(window).resize(function() {
		if (jQuery(window).width() < 1025) {
			jQuery(".child-content .l-col h3").addClass('hyphenate');
      jQuery(".ansatt .stilling").addClass('hyphenate');
      jQuery(".ansatt .epost").addClass('hyphenate');
      jQuery(".hsvartitle").addClass('hyphenate');
      jQuery(".topheader h1").addClass('hyphenate');
		}

    if (jQuery(window).width() < 480) {
      jQuery('.vimener .col-r').each(function() {
        jQuery(this).insertBefore(jQuery(this).prev('.col-l'));
      });
    };

	}).resize();
	jQuery('.hyphenate').hyphenate('nb-no');





});


jQuery(document).ready(function() {
	jQuery(".drop p").after("<div class='btn-lol'><img src='http://fbr.comingsoon.no/wp-content/themes/fr/img/icons/menu-b-v.svg' alt=''></div>");
});
jQuery(document).ready(function() {
	jQuery(".menu-depth-1").prepend('<div class="arrow-down"></div>');
});

jQuery(document).ready(function() {
 	jQuery('.status_collapse:contains("Nei")').closest( ".child" ).find( ".child-header" ).addClass("utvidet");
	//jQuery(".collapse").hide();
	//toggle the content
	jQuery(".child-header").click(function(){
		jQuery(this).next(".collapse").slideToggle(500);
		jQuery(this).toggleClass("utvidet");
		jQuery(this).find(".openclose").toggleClass("opup");

	});

	jQuery(".child-header").click(function(){
		jQuery(this).next(".collapse_up").slideToggle(500);
	});
});

jQuery(document).ready(function() {

	jQuery(".archive_drop").click(function(){
		jQuery(this).find(".collapse").slideToggle(500);
		jQuery(this).toggleClass("utvidet");
		jQuery(this).find(".openclose").toggleClass("opup");
	});

	jQuery(".archive_drop").click(function(){
		jQuery(this).next(".collapse_up").slideToggle(500);
	});

  jQuery(".archive_drop .collapse").hide();
});

jQuery(document).ready(function() {
  // Add unique numbers to infoboxes on kontakt-oss
	jQuery('.infoboks').each(function(i) {

	i = i+1;

	jQuery(this).addClass('b' + i);

	});
  // Add unique numbers to steps on klageguiden
	jQuery('.step').each(function(i) {

	i = i+1;

	jQuery(this).attr('id', 's_' + i);

	});
  // Add unique numbers to fields on single klagebrev
  jQuery('.field-wrap').each(function(i) {

  i = i+1;

  jQuery(this).addClass('field' + i);

  });

  jQuery('.field-wrap:lt(8)').addClass('personal-info');
  // Get fields fron single klagebrev, skip 8 fields and apply class to input fields from 9 and up
  jQuery('.field-wrap:gt(7):lt(25)').addClass('wrap-in-text');
  jQuery('.nf-desc').has('button').addClass('unwrap-button');

  jQuery("input[placeholder]").each(function() {
    var placeholder = jQuery(this).attr("placeholder").length;

    jQuery(this).css({'min-width': placeholder * 10 + 'px'})

  });


});






jQuery(document).ready(function() {
  jQuery('.felt:contains("Spørsmål")').closest( ".child" ).addClass("spm");
  jQuery('.felt:contains("Svar")').closest( ".child" ).addClass("answr");
  jQuery('.felt:contains("Klagebrev")').closest( ".child" ).addClass("klgbrv");
  jQuery('.felt:contains("Check")').closest( ".child" ).addClass("chk");
  jQuery('.status_collapse:contains("Nei")').closest( ".toggle" ).removeClass("collapse").addClass("collapse_up");

    if (jQuery(".child").hasClass("spm")) {
      jQuery( ".spm .child-header-icon" ).append("<img src='http://fbr.comingsoon.no/wp-content/themes/fr/img/icons/questionmark.svg'>");
    }
    if (jQuery(".child").hasClass("answr")) {
      jQuery( ".answr .child-header-icon" ).append("<img src='http://fbr.comingsoon.no/wp-content/themes/fr/img/icons/exclamationmark.svg'>");
    }
    if (jQuery(".child").hasClass("klgbrv")) {
      jQuery( ".klgbrv .child-header-icon" ).append("<img src='http://fbr.comingsoon.no/wp-content/themes/fr/img/icons/pen.svg'>");
    }
    if (jQuery(".child").hasClass("chk")) {
      var styles = {
          maxWidth: "100%",
          width: "100%"
        };
      jQuery( ".chk .child-header-icon" ).append("<img src='http://fbr.comingsoon.no/wp-content/themes/fr/img/icons/check.svg'>");
      jQuery( ".chk .l-col, .chk .l-relates" ).remove();
      jQuery( ".chk .r-col, .chk .r-relates" ).css( styles );
    }



jQuery('.item:not(:first-child,:nth-child(2))').addClass('hideme');
    /* Every time the window is scrolled ... */
    jQuery(window).scroll( function(){

        /* Check the location of each desired element */
        jQuery('.hideme').each( function(i){

            var bottom_of_object = jQuery(this).offset().top + jQuery(this).outerHeight();
            var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){

                jQuery(this).animate({'opacity':'1'},1000);
            }

        });

    });

jQuery('.ninja-forms-field').each(function(){
  if (jQuery(this).html() == "."){
    jQuery(this).addClass("nf-hide");
  }
});

  // Todays date in a single klagebrev

  if (document.getElementById("klagedato")) {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();

      if(dd<10) {
          dd='0'+dd
      }

      if(mm<10) {
          mm='0'+mm
      }

      today = dd+'.'+mm+'.'+yyyy;

      document.getElementById("klagedato").innerHTML=today;
  };

  jQuery('.status_collapse').each(function() {
    if (jQuery(this).text().indexOf('Nei') > -1) {
      jQuery(this).parent().siblings('.child-header').addClass('utvidet');
      jQuery(this).parent().css({display: 'block'});
    } else if (jQuery(this).text().indexOf('Ja') > -1) {
      jQuery(this).parent().siblings('.child-header').removeClass('utvidet');
      jQuery(this).parent().css({display: 'none'});
    }
  });

});
