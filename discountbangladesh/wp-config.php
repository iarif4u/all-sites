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
define( 'DB_NAME', 'backup-site' );

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
define( 'AUTH_KEY',          'e{<%%kyZ~.kExm9p|X*R@hb5Q$k-bgqF>{~;3jlQqeueTj7&1Gj#E5Ln&&bsD5,T' );
define( 'SECURE_AUTH_KEY',   'j|F=zs>&B,r_F6;,540]-.8j]FXv*C7NN&D+fPab%J$F%FdV^/x2&bp<+2o-w?4p' );
define( 'LOGGED_IN_KEY',     '}JcS-]OrMg]pbAhZp~kG7ny2e/128M>i WU6Pms0e+vV{wGxhpc,3JL!71)@=7!a' );
define( 'NONCE_KEY',         'R9?MN8om(nX6X#XTPrr>(B}vKrK#IIDV/&rDQ^[~;5}5I<( mo+P*dk_+?H0a]G,' );
define( 'AUTH_SALT',         '<UvvGO9$WQ~8uS4m0q %=gk,etUcqvOmD9`i-O3T7EkF@br(#E(<g77&r=1X!+}m' );
define( 'SECURE_AUTH_SALT',  'PcdG~M@|~-?+NMIj:7nPF>b;=1LKIp:XO]w:0BG|#!]`g[(4$A(WG-+8}e0&~]IC' );
define( 'LOGGED_IN_SALT',    '4ah$E7EF{2*%gN9mPJ*$Y1P=S|9WgG{ 7>[j WPUqnQKo^7&!lp^APPSh6Aw#*30' );
define( 'NONCE_SALT',        'F8>/4+oo!A[J:3e3d=$-SQ|bO[VaaVBaOs_F[<2GEcG}NDs$ex<Yved%E;F7Nk]3' );
define( 'WP_CACHE_KEY_SALT', 'wDh/tCnD.P-,umoVY~-6uw=l&D.,W0O~zmW]8l.{zSwzkZZqG#s!%*U=_>r6?DQj' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'discountbanglad_3_';


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

define( 'WP_REDIS_DISABLE_BANNERS', 'true' );
define( 'DISABLE_WP_CRON', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
