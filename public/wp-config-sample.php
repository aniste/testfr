<?php
/**
 * Grunnkonfigurasjonen til WordPress.
 *
 * Denne filen brukes av koden som lager wp-config.php i løpet av installasjonen.
 * Du trenger ikke å bruke nettstedet til å gjøre det, du trenger bare
 * å kopiere denne filen til "wp-config.php" og fylle inn verdiene.
 *
 * Filen inneholder følgende konfigurasjoner:
 *
 * * MySQL-innstillinger
 * * Hemmelige nøkler
 * * Tabellprefiks for database
 * * ABSPATH
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php
 * 
 * @package WordPress
 */

require 'fbr-config.php';

/**#@+
 * Autentiseringsnøkler og salter.
 *
 * Endre disse til unike nøkler!
 * Du kan generere nøkler med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan når som helst endre disse nøklene for å gjøre aktive cookies ugyldige. Dette vil tvinge alle brukere å logge inn igjen.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'angi din unike nøkkel her');
define('SECURE_AUTH_KEY',  'angi din unike nøkkel her');
define('LOGGED_IN_KEY',    'angi din unike nøkkel her');
define('NONCE_KEY',        'angi din unike nøkkel her');
define('AUTH_SALT',        'angi din unike nøkkel her');
define('SECURE_AUTH_SALT', 'angi din unike nøkkel her');
define('LOGGED_IN_SALT',   'angi din unike nøkkel her');
define('NONCE_SALT',       'angi din unike nøkkel her');

/**#@-*/

/**
 * WordPress-databasens tabellprefiks.
 *
 * Du kan ha flere installasjoner i en databasehvis du gir dem hver deres unike
 * prefiks. Kun tall, bokstaver og understrek (_), takk!
 */
$table_prefix  = 'wp_';

/**
 * For utviklere: WordPress-feilsøkingstilstand.
 *
 * Sett denne til "true" for å aktivere visning av meldinger under utvikling.
 * Det er sterkt anbefalt at utvidelses- og tema-utviklere bruker WP_DEBUG
 * i deres utviklermiljøer.
 * 
 * For informasjon om andre konstanter som kan benyttes under utvikling,
 * besøk vår Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
