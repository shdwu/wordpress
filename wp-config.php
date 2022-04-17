<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/var/www/html/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME','wordpress');

/** MySQL database username */
define( 'DB_USER','shdwu');

/** MySQL database password */
define( 'DB_PASSWORD','19910412Aa.');

/** MySQL hostname */
define( 'DB_HOST', '47.109.19.199:7536' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY','e2yLsdOgngXDBXNWp/grWQP1++oGjpu/XWEGNOUIz+ZwBoVNtzaJ3b2rxpuEZM5m');
define('SECURE_AUTH_KEY','9TgTM5wZqfTRAb36eWX1AXEhpKJGrVN6IIyv291xUp+gSq9Q6qGyHVk2Fd0mRYAL');
define('LOGGED_IN_KEY','Aw/vCzrCuda+CNfqVzNRv9QuVVMmpy03/gSxdgUdgZ7Q+hpL7tvZQxUp1sZLt+8S');
define('NONCE_KEY','EilPoL1Cqgq32pbWfn+1VKLAaOp/UeDXb2fNh8UgmiNzpB1E7hjbJnM/X1fqdLCP');
define('AUTH_SALT','dtDc0SZo+lIjLWbuwAv7edOC3Xz0olyMS12pC3e2VsgOt1tfw7R2BSaRaNQwpIuH');
define('SECURE_AUTH_SALT','6/TRJiqqESMEq+lW/TfFq72F3yTa7rMk3mwbgsRh2JQIvldSbtmgCW53wy8TALNG');
define('LOGGED_IN_SALT','1zFNppqahn0iVaZ4/D/2Q50ERcLXWqdaWBFp+zRTBEdY/o30WL4ThDUABdhmEkoR');
define('NONCE_SALT','uUVb1BdMu8tq/qemduj+liAnfOnQRH+CSJ/tadourbOkLawD2TM8t2m5Pc0tfiQU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

$pageURL = 'http';
if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80" and $_SERVER["SERVER_PORT"] != "443") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
} else {
    $pageURL .= $_SERVER["SERVER_NAME"];
}

#SYNOLOGY CUSTOMIZE FIX URL ALIAS
$path = substr($_SERVER['SCRIPT_FILENAME'], strlen("/var/services/web_packages/wordpress"));
$alias = substr($_SERVER['REDIRECT_URL'], 0, strlen($_SERVER['REDIRECT_URL']) - strlen($path));

define('WP_SITEURL', $pageURL.$alias);
define('WP_HOME', $pageURL.$alias);
#SYNOLOGY CUSTOMIZE FIX URL ALIAS

if (!defined('SYNOWORDPRESS'))
    define('SYNOWORDPRESS', 'Synology Inc.');

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
require_once ABSPATH . 'syno-misc.php';

define( 'AUTOMATIC_UPDATER_DISABLED', true );
add_filter('pre_site_transient_update_core','__return_null');
