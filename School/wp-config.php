<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ianxmills40631_70le_tumhiaqxjyca' );

/** MySQL database username */
define( 'DB_USER', 'pdswstgsagmbtlwk' );

/** MySQL database password */
define( 'DB_PASSWORD', 'bl8quDR5ZvcgeqI' );

/** MySQL hostname */
define( 'DB_HOST', 'ianxmills40631.ipagemysql.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '1J*Hxg3xeemzq5oho=A1)}}YO]c*duF#-<ug(:cXj01HO[=AXI*2!*N(ygq2L6JG' );
define( 'SECURE_AUTH_KEY',   'c: YnfT,ISvjSCLn%qYg/9Mo{3H9qiVZzU+]+j-6oPB=$F%ALc:MOXY0+_g*gO*2' );
define( 'LOGGED_IN_KEY',     '9Z=B+Vc^>^wm%jB425o<3&!5DVW-mqebs$AK#0S2^T8j5dt*T{aCW-&K03|r9d}s' );
define( 'NONCE_KEY',         '-JlQeWp8M4t,HT]*u{TN7#rS6^aeV_SFM0Xy O[CGS*T(^}usFE3tLBM<}T6nh4 ' );
define( 'AUTH_SALT',         'EFUwX?Vj|;[EiA{fwFo22~$@[W~CSBJ>>:&c=Y#9OWS[V}&uh@[w#&78@9neO;CR' );
define( 'SECURE_AUTH_SALT',  ':5G#zdTx$m APqvXWc=-nj<-(&~tG#(fctc9L6]T#j!>gC5<}l+V1LaGM^sPo?BC' );
define( 'LOGGED_IN_SALT',    'BG>/-eN?Rmcw%ur}+5O]UyPD0_Cd|SS*u;sifh@>n!F1jQo~c4auu2WAq4o>#k.V' );
define( 'NONCE_SALT',        'wLG,cvW{oIHfy <|+l9q/G!ARNa;12%U1ymK?Mb.~-AEl_x63KO=wGCGanV`_)rD' );
define( 'WP_CACHE_KEY_SALT', ':F8(!Vk!P1aEF ~Y!}x3S^$e4N5v;ROQc!Z3KcF=#.|Ph~k%.{xtZuc0BaQUxwSe' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '70le_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');
