(function($) {

  function initNFPrintButton() {
    var doPrint = false;

    function showPrintDialog() {
      doPrint = true;

      var win = window.open('about:blank', 'pdfdownload');
      $('.ninja-forms-form').first().attr('target', 'pdfdownload').get(0).submit();
    }

    function showDownloadDialog() {
      doPrint = false;
      $('.ninja-forms-form').first().attr('target', '').get(0).submit();
    }

    $(".ninja-forms-field button").each(function(idx, el) {
      if ( $.trim($(el).html()).toLowerCase() == "skriv ut" ) {
        $(el).hide(); // issue163933 
        //$(el).on("click", showPrintDialog);
      } else if ( $.trim($(el).html()).toLowerCase() == "last ned brev som pdf" ) {
        $(el).on("click", showDownloadDialog);
      }
    });
  }

  $(function() {
    initNFPrintButton();
  });

})(jQuery);
