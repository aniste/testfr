<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <div class="wrapper page-wrap topper">
      <main class="head">

          <header class="header clear">

          <div class="optional_container">
              <ul id="menu">

                <li class="menulogo"><a href="#" class="drop"></a>
                <div class="logo">
                  <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/Logo_FR.png" alt="Logo" class="logo-img">
                  </a>
                </div>
                </li>


                <li class="search">
                  <div class="search-container">
                    <?php get_search_form(); ?>
                  <div class="clear"></div>
                </div>
                </li>

                <li class="menu_right menubutton">
                <a href="#" class="drop">
                  <div id="menu-text">MENY</div>
                  <div class="btn-lol">
                    <!--
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icons/meny.png" alt="">
                    -->
                    <i class="fa fa-bars"></i>
                  </div>
                </a>


                  <div class="dropdown_4columns align_right">

                    <div class="dropdown-container">
                    <div class="arrow-up"></div>

                    <div class="col_4">

                      <h4>Vi hjelper deg</h4>
                      <ul>
                        <li><a href="/forside/angrer-du-pa-et-kjop/">Angrer du p&aring; et kj&oslash;p?</a></li>
                        <li><a href="/forside/feil-ved-vare/">Grunn til &aring; klage?</a></li>
                        <li><a href="/klageguide/">Slik klager du</a></li>
                        <li><a href="/forside/kontrakter/">Kontrakter</a></li>
                        <li><a href="/forside/klagebrev/">Klagebrev</a></li>
                        <li><a href="/forside/nytt-og-nyttig/">Nytt og nyttig</a></li>
                      </ul>

                    </div>

                    <div class="col_4">

                      <h4>V&aring;re tips og r&aring;d</h4>
                      <ul>
                        <li><a href="/forside/bil/">Bil</a></li>
                        <li><a href="/forside/bolig/">Bolig</a></li>
                        <li><a href="/forside/okonomi-og-betaling/">&Oslash;konomi og betaling</a></li>
                        <li><a href="/forside/digitalt/">Digitalt</a></li>
                        <li><a href="/forside/reise/">Reise</a></li>
                        <li><a href="/forside/varer-og-tjenester/">Andre varer og tjenester</a></li>
                      </ul>

                    </div>

                    <div class="col_4">

                      <h4>Vi mener</h4>
                      <ul>
                        <li><a href="/forside/fpa-bolig/">Bolig</a></li>
                        <li><a href="/forside/fpa-finans/">Finans</a></li>
                        <li><a href="/forside/fpa-mat-produktsikkerhet-og-handel/">Mat og handel</a></li>
                        <li><a href="/forside/fpa-digital/">Digital</a></li>
                        <li><a href="/forside/fpa-offentlig-og-helse/">Offentlige tjenester</a></li>

                      </ul>

                    </div>

                    <div class="col_4">

                      <h4>Dette er oss</h4>
                      <ul>
                        <li><a href="/forside/om-oss/">Om oss</a></li>
                        <li><a href="/kontakt-oss/">Kontakt oss</a></li>
                        <li><a href="/forside/jobb-hos-oss/">Jobb hos oss</a></li>
                        <li><a href="/presse/">Presse</a></li>
                        <li><a href="/horingssvar/">H&oslash;ringssvar</a></li>
                      </ul>

                    </div>
                    <br class="desktop" style="clear:both;" />
                    <div class="col_1">

                    </div>

                    <div class="col_4">

                      <h4>Vi unders&oslash;ker</h4>
                      <ul>
                        <li><a href="/forside/vi-undersoker/">Tester, guider og unders&oslash;kelser?</a></li>
                      </ul>

                    </div>
                    <div class="col_4 blank">

                      <h4></h4>
                      <ul>
                        <li></li>
                      </ul>

                    </div>
                    <div class="col_4">

                      <h4>Nyttige tjenester</h4>
                      <ul>
                        <li><a href="/fly/">Flyrettighetskalkulatoren</a></li>
                        <li><a href="/merkeoversikten/">Merkeoversikten</a></li>
                        <li><a href="/henvendelsestatistikk/">Henvendelsestatistikk</a></li>
                        <li><a href="/kommunetesten/">Kommunetesten</a></li>
                      </ul>

                    </div>
                    <div class="col_4">

                      <h4>V&aring;re nettsteder</h4>
                      <ul>
                        <li><a href="http://www.hvakostertannlegen.no/">Hva koster tannlegen</a></li>
                        <li><a href="http://www.finansportalen.no/">Finansportalen</a></li>

                        <li><a href="http://www.strompris.no/nb/#/">Str&oslash;mpris</a></li>
                        <li><a href="http://www.forbrukereuropa.no/">Forbruker Europa</a></li>
                      </ul>

                    </div>
                    <div class="clear"></div>
                  </div>

                  </div>
                </li>

                <li class="menu_right searchbutton">
                  <div class="btn-lol">
                    <a href="/?s="><i class="fa fa-search"></i></a>
                  </div>
                </li>


              </ul>
            </div>

          </header>

        </main>
    </div>
    <div class="push-search"></div>
    <div class="wrapper page-wrap breader">
      <div class="main-container">

        <div class="bread">
          <div class="breadcrumbs">
              <?php //if(function_exists('bcn_display'))
              //{
                  //bcn_display(false, false);
              //}
              ?>
          </div>
        </div>
      </div>
