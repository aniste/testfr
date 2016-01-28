<?php
    /*
    Template name: External content
    */

    get_header();
?>

<style type="text/css">

    /* Reset Style */
    body {
        margin: 0 !important;
    }

    .wrapper {
        max-width: 100% !important;
    }

    .page-wrap {
        min-height: initial !important;
    }

    .wrapper.page-wrap.topper {
        min-height: inherit !important;
    }

    .main {
        padding-top: 0px !important;
    }

    #container-external-content .wrapper {
        max-width: 1140px !important;
        position: static;
        display: block;
    }

    .breader {
        max-width: 1140px !important;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 20px;
    }

    @media screen and (max-width: 480px) {
        body {
            margin: 0 !important;
        }

        .footer.site-footer {
            position: static !important;
        }

        .push {
            height: 0px;
        }
    }

    @media screen and (min-width: 769px) {
        .breader {
            min-height: 400px!important;
        }
    }

    /* Profile Style */
    .form .btn--big {
        margin-bottom: -20px;
        padding: 4px 30px;
        font-size: 18px;
        display: block;
        border: 3px solid #000;
        border-radius: 0px;
        background: #fff;
    }

    .btn--big:hover {
        color: #fff;
        background: #000;
    }

    .btn--forward {
        background-size: none;
    }

    .btn--forward {
        background-size: auto 60%, auto;
        border-radius: 0;
        background-color: #d7f5f7;
    }

    #container-external-content h1,
    #container-external-content h2,
    #container-external-content h3 {
        font-family: FFClanWebMedium, sans-serif !important;
        font-size: 26px !important;
        font-weight: normal !important;
        color: #000000!important;
    }

    #container-external-content p {
        font-family: FFClanWebBook, sans-serif !important;
        font-size: 16px !important;
        font-weight: normal !important;
        color: #000000!important;
    }

     #container-external-content label {
        color: #000 !important;
    }

     #container-external-content .wizard-actions .btn {
        border: 3px solid #000 !important;
        border-radius: 0px !important;
        background-color: #fff !important;
    }

</style>

<main>
    <div id="container-external-content" class="clearfix clear">
        <!-- Implementation code goes here -->
        xxxEXTERNAL-CONTENTxxx

        <div class="clear"></div>
        <div class="hyphenate"></div>
    </div>
</main>

<script type="text/javascript">
    window.onload = function () {
        jQuery( document ).ready( function () {
            
            var scale = function () {

                jQuery( window ).resize( function () {



                    if (jQuery( window ).width() <= 481)
                    {
                        jQuery( '.site-footer' ).css( "cssText", "position: static !important;" );
                    }
                    
                    else {
                        if (jQuery( window ).height() >= 930)
                    {
                        jQuery( '.site-footer' ).css( {position: 'absolute'} );

                        if (jQuery( '.breader' ).height() > 360)
                        {
                            
                            jQuery( '.breader' ).css( 'cssText', 'margin-bottom: 100px !important;');
                        } else if (jQuery( '.breader' ).height() < 359)
                        {
                            jQuery( '.site-footer' ).css( "cssText", "position: absolute !important;" );
                        }

                    }

                    else if (jQuery( window ).height() <= 931)
                    {
                        jQuery( '.site-footer' ).css( "cssText", "position: static !important;" );
                        jQuery( 'body' ).css( "cssText", "margin: 0 !important;" );
                    }
                      
                    }
                    
                } ).resize();
                
            }
            setInterval(scale, 500);

            
            jQuery('.menubutton').click(function() {
                jQuery(this).toggleClass('clicked')
            });

        } );
    };
</script>

<div class="clear"></div>
<?php get_footer();