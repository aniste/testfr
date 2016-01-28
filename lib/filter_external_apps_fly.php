#!/usr/bin/php
<?php
    /**
     * Date:    15.12.15
     * Time:    11.13
     * Project: Forbrukerradet Proxy filter for Flyrettighetskalkulatoren
     * Copyright (C) 2015 Copyleft Solutions AS
     *
     * This program is free software; you can redistribute it and/or
     * modify it under the terms of the GNU General Public License
     * as published by the Free Software Foundation; either version 2
     * of the License, or (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program; if not, write to the Free Software
     * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
     */

    //  ob_start();


    $page = file_get_contents('php://stdin');

    if ((strstr($_SERVER['REQUEST_URI'], '/scp/'))
        || (strstr($_SERVER['REQUEST_URI'], 'captcha.php'))
        || (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && (strstr(
                $_SERVER['HTTP_X_REQUESTED_WITH'],
                'XMLHttpRequest'
            )))
    ) {
        file_put_contents('php://stdout', $page);
        exit();
    }

    $resCss      = preg_match_all('/(<link rel="stylesheet".*>)/', $page, $matches_css);
    $resJs       = preg_match_all('/(<script src=".*<\/script>)/', $page, $matches_js);
    $resJsInline = preg_match_all('/(<script>.*<\/script>)/Us', $page, $matches_js_inline);
    $resTitle    = preg_match('/<title.*>(.*)<\/title>/Us', $page, $matches_title);

    $resMetas = preg_match_all('/(<meta property="og:.*>)/', $page, $matches_meta);

    //$res_csrf = preg_match('/<meta name="csrf\_token" content="([a-z0-9]+)".*/', $page, $matches_csrf);

    $hasStylesheets       = $resCss > 0 ? true : false;
    $hasJavascripts       = $resJs > 0 ? true : false;
    $hasInlineJavascripts = $resJsInline > 0 ? true : false;
    $hasTitle             = $resTitle > 0 ? true : false;
    $hasMeta              = $resMetas > 0 ? true : false;


    //    $csrfToken = '';
    //    if (is_array($matches_csrf) && array_key_exists(0, $matches_csrf)) {
    //        $csrfToken = $matches_csrf[1];
    //    }

    // Remove header content from application
    $page = preg_replace('/.*<body>/Us', '', $page);

    // Remove hard links to old frontpage
    $page = preg_replace('/http:\/\/www\.forbrukerradet\.no\/forside"/', '/"', $page);


    // During DEVELOPMENT: Rewrite to dev site
    // $page = str_replace('http://www.forbrukerradet.no"', 'http://fbr.comingsoon.no"', $page);
    $page = str_replace('</body>', '', $page);
    $page = str_replace('</html>', '', $page);
    $page = preg_replace('/<script.*<\/script>/Us', '', $page);


    // Fetching the empty template
    $fbr = file_get_contents('http://www.forbrukerradet.no/external-content/');

    // Splitting the blank template at the placeholder text into header and footer
    list($head, $foot) = explode('xxxEXTERNAL-CONTENTxxx', $fbr);

    // Remove the empty template's link canonical
    $head = preg_replace('/<link rel=\'(canonical|shortlink)\'.*\/>/U', '', $head);
    $head = preg_replace('/<meta name=\"keywords\" content=\"eksterne sider\" \/>/', '', $head);

    // $head = preg_replace('/<link rel=\'shortlink\'.*\/>/U', '', $head);

    if ($hasStylesheets === true) {
        $stylesheets = implode("\n  ", $matches_css[0]);
        $head        = str_replace('</title>', "</title>\n  ".$stylesheets, $head);
    }

    if ($hasInlineJavascripts === true) {
        $finalInlineJS = array();
        foreach ($matches_js_inline[0] as $k => $ilScript) {
            if (stripos($ilScript, 'GoogleAnalyticsObject') === false) {
                $finalInlineJS[] = $ilScript;
            }
        }
        if (count($finalInlineJS) > 0) {
            $foot = str_replace('</body>', implode("\n  ", $finalInlineJS)."\n</body>", $foot);
        }
    }

    if ($hasJavascripts === true) {
        $finalJS = array();
        foreach ($matches_js[0] as $k => $script) {
            if (stripos($script, 'jquery.') === false) {
                $finalJS[] = $script;
            }
        }
        if (count($finalJS) > 0) {
            $foot = str_replace('</body>', implode("\n  ", $finalJS)."\n</body>", $foot);
        }
    }

    if ($hasTitle === true) {
        $head = preg_replace(
            '/<title.*>.*external-content(.*)<\/title>/Us',
            '<title>'.$matches_title[1].'\1'.'</title>',
            $head
        );
    }

    if ($hasMeta === true) {
        $head = str_replace('</title>', '</title>'.implode("\n", $matches_meta[0])."\n", $head);
    }


    // $data = ob_get_flush();
    $data = $head.$page.$foot;
    file_put_contents('php://stdout', $data);
