#!/usr/bin/php
<?php
    /**
     * Date:    15.12.15
     * Time:    11.13
     * Project: Forbrukerradet Proxy filter
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

    $rescss   = preg_match_all('/(<link rel="stylesheet".*)/', $page, $matches_css);
    $resjs    = preg_match_all('/(<script src=".*)/', $page, $matches_js);
    $resTitle = preg_match('/<title.*>(.*)<\/title>/Us', $page, $matches_title);
    $res_csrf = preg_match('/<meta name="csrf\_token" content="([a-z0-9]+)".*/', $page, $matches_csrf);

    $hasStylesheets = $rescss > 0 ? true : false;
    $hasJavascripts = $resjs > 0 ? true : false;
    $hasTitle       = $resTitle > 0 ? true : false;


    $csrfToken = '';
    if (is_array($matches_csrf) && array_key_exists(0, $matches_csrf)) {
        $csrfToken = $matches_csrf[1];
    }

    // Remove header content from application
    $page = preg_replace('/.*<body>/Us', '', $page);
    // During DEVELOPMENT: Rewrite to dev site
    $page = str_replace('http://www.forbrukerradet.no"', 'http://fbr.comingsoon.no"', $page);
    $page = str_replace('</body>', '', $page);
    $page = str_replace('</html>', '', $page);


    // Fetching the empty template
    $fbr = file_get_contents('http://fbr.comingsoon.no/external-content/');

    // Splitting the blank template at the placeholder text into header and footer
    list($head, $foot) = explode('xxxEXTERNAL-CONTENTxxx', $fbr);

    if ($hasStylesheets === true) {
        $stylesheets = implode("\n  ", $matches_css[0]);
        $head        = str_replace('</title>', "</title>\n  ".$stylesheets, $head);
    }
    if ($hasJavascripts === true) {
        $finalJS = array();
        foreach ($matches_js[0] as $k => $script) {
            if (stripos('jquery.', $script) === false) {
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

    // $data = ob_get_flush();
    $data = $head.$page.$foot;
    file_put_contents('php://stdout', $data);
