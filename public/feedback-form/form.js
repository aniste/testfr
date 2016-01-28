(function($) {
  'use strict';

  var sent = false;
  var busy = false;
  var answer;

  function toggleButton(el) {
    $('#feedback-form-top button').removeClass('active');
    el.addClass('active');
  }

  function sendForm() {
    if ( busy ) {
      return;
    }
    busy = true;

    var txt = $.trim($('#feedback-form textarea').val());
    var url = window.location.toString();
    $.post('/feedback-form/send.php', {answer: answer, message: txt, url: url}, function(data) {
      busy = false;

      if ( data && data.success ) {
        sent = true;

        $('#feedback-form-inner').hide();
        $('#feedback-form-result').show();
      } else {
        var error = (data ? data.error : null) || 'Klarte ikke sende, vennligst prøv igjen';
        alert(error);
      }
    });

  }

  function initForm() {
    var html = $('<div id="feedback-form"></div>');
    html.append($('<div id="feedback-form-top"><span>Fant du det du lette etter?</span> <button id="feedback-form-yes">Ja</button> <button id="feedback-form-no">Nei</button></div>'));
    html.append($('<div id="feedback-form-result"><span>Tusen takk for tilbakemeldingen</span></div>'));
    html.append($('<div id="feedback-form-inner"><div><textarea id="feedback-form-input"></textarea></div><div><button id="feedback-form-send">Send</button></div></div>'));

    $('main.contentfield > section').last().append(html);

    $('#feedback-form-yes').on('click', function(ev) {
      ev.preventDefault();
      if ( !sent ) {
        answer = 'yes';

        $('textarea').attr('placeholder', 'Supert. Hva lette du etter? Din tilbakemelding hjelper oss å lage bedre nettsider.');
        $('#feedback-form-inner').show();

        toggleButton($(this));
      }
    });

    $('#feedback-form-no').on('click', function(ev) {
      ev.preventDefault();
      if ( !sent ) {
        answer = 'no';

        $('#feedback-form textarea').attr('placeholder', 'Hva lette du etter? Din tilbakemelding hjelper oss å lage bedre nettsider.');
        $('#feedback-form-inner').show();

        toggleButton($(this));
      }
    });

    $('#feedback-form-send').on('click', function(ev) {
      ev.preventDefault();
      sendForm();
    });
  }

  $(function() {
    var b = $('body');
    if ( b.hasClass('page-template-prior-purchase') || b.hasClass('page-template-after-purchase') || b.hasClass('search-results') ) {
      if ( !$('#feedback-form').length ) {
        initForm();
      }
    }
  });

})(jQuery);
