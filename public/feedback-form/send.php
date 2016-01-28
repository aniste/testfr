<?php
/*

CREATE TABLE IF NOT EXISTS `feedback_form` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

 */

///////////////////////////////////////////////////////////////////////////////
// CONFIG
///////////////////////////////////////////////////////////////////////////////


require '../fbr-config.php';

///////////////////////////////////////////////////////////////////////////////
// HELPERS
///////////////////////////////////////////////////////////////////////////////

function report($answer, $message, $url, $ip) {
  if ( report_db($answer, $message, $url, $ip) ) {
    report_mail($answer, $message, $url, $ip);
    return true;
  }
  return false;
}

function report_db($answer, $message, $url, $ip) {
  $dsn  = sprintf('mysql:dbname=%s;host=%s', DB_NAME, DB_HOST);
  $args = Array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
    PDO::ATTR_ERRMODE            => true,
    PDO::ERRMODE_EXCEPTION       => true
  );

  if ( !($db = new PDO($dsn, DB_USER, DB_PASSWORD, $args)) ) {
    throw new Exception('databasefeil');
  }

  $q = 'INSERT INTO feedback_form (answer, message, url, ip, created_at) VALUES(?, ?, ?, ?, NOW())';
  $a = Array($answer ? 'yes' : 'no', $message, $url, $ip);

  if ( $sth = $db->prepare($q) ) {
    return $sth->execute($a);
  }
  return false;
}

function report_mail($answer, $message, $url, $ip) {
  $date    = new DateTime();
  $date    = $date->format("Y-m-d H:i:s");

  $message = sprintf("URL: %s\nIP: %s\nDato: %s\nSvar: %s\nKommentar: %s", $url, $ip, $date, $answer ? 'Ja' : 'Nei', $message);

  $headers = sprintf('From: %s', MAIL_FROM) . "\r\n" .
             sprintf('Reply-To: %s', MAIL_FROM) . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

  return mail(MAIL_TO, MAIL_SUBJECT, $message, $headers);
}

///////////////////////////////////////////////////////////////////////////////
// MAIN
///////////////////////////////////////////////////////////////////////////////

date_default_timezone_set('Europe/Oslo');


$result = Array('error' => false, 'success' => false);

try {
  if ( !empty($_POST['answer']) && isset($_POST['message']) ) {
    $answer = trim($_POST['answer']) === 'yes';
    $message = htmlspecialchars(trim($_POST['message']));
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
    if ( !($url = isset($_POST['url']) ? $_POST['url'] : '') ) {
      $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'UNKNOWN';
    }

    if ( report($answer, $message, $url, $ip) ) {
      $result['success'] = true;
    } else {
      throw new Exception('kommunikasjonsfeil');
    }
  } else {
    throw new Exception('ingen data');
  }
} catch ( Exception $e ) {
  $result['error'] = "Feil under sending av melding ({$e->getMessage()})";
}


header('Content-Type: application/json');
print json_encode($result);

?>
