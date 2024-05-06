<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'multisite' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'G<-%x{(W*N>)4-{!GY60Ld+sd_btc[>r)oh Qj)-fYxduF~ddvaV>JERA.f%|F`p' );
define( 'SECURE_AUTH_KEY',   '+a|&u}W6vHssh<K2x8 ^mUckjSGn*0fG5Ki|~sonX5C!Vbf4ewBs ?UG[OCO@D{M' );
define( 'LOGGED_IN_KEY',     'HD9ETUcOoofKo_<7/$XKj4:x9Z8>5hT|g-Ae,-,5d506N^vR.OY^on^dYp?bzQ5t' );
define( 'NONCE_KEY',         'tB?558/.6:?T2+`!kmn a[~UKTr5eP<n.^yZ-u4_9u5M6R.50B7NH&z6N[7r$b]h' );
define( 'AUTH_SALT',         '45:}*kMtYv4[KB`o:OO4u|wJ2mYCV`+kE+q.O:V-/!r#5)F^Nnz~jA^UC+a/vq` ' );
define( 'SECURE_AUTH_SALT',  'R7_5IJ:pn$ STOQ:OL,DW-hY7Z22pW%clz~QJh$Q1a@`S7NQT}GPhZryCA]V|$)7' );
define( 'LOGGED_IN_SALT',    '7HQre(%w4wa#>qm$G7H,>io~5&r4ko=KzzvTH%j.Xl40Im&Y5_istB%Eq=^qK :H' );
define( 'NONCE_SALT',        'gBQRf<dkr113LYoF_8VE@tEC)UOS#=Z::lJk$Guq_6q7/Sy`GbDmV9;mOgt ;)s$' );
define( 'WP_CACHE_KEY_SALT', '_0;}@yH0{GP2|$U}2K:F:E4]fc{<>I6@Fs[U`&CaF^@lH~@nWt#u S:yg1yQg>b.' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ldra_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}



define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'multisite.test' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
