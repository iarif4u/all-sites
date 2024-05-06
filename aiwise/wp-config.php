<?php
define( 'WP_CACHE', true ); // Added by WP Rocket


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
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'E(wN;WnX7x+#dr$PFVOMh|lvnwKA$S<mZ;&~FfIn0;yk95X[N??Y?SqdI!MF4xoN' );
define( 'SECURE_AUTH_KEY',   'nz5ngN#yYnOSt!T=z2.Q2.`@`%V?Wx&N_NbXPT4qUW#loT0| .|fLcb%m36y>L4#' );
define( 'LOGGED_IN_KEY',     'M(]:%els35Zp8oZmT5gvA #$gf<+(IG8=p[MVY4A;G+LEE?}Ozy6+}iY?9C1s!22' );
define( 'NONCE_KEY',         '3JL&,%%jzxCfeB-voQ99oJ[A7w.|~zXBz])C(LpHK>F|{ZNqf0KbAM$jd!aD=W&`' );
define( 'AUTH_SALT',         'bm3haDyx|t5;uhY~u=*oIH/wJw1*OasKt=IDqQ(~iSY+ W7!X)h UvamJC(niTpO' );
define( 'SECURE_AUTH_SALT',  '50`(<sVyEyXmDVaaT3>lp=;%+p6F2gorB7$Iw},UZdKuOgdAaF@6d|1^/|/1g!u)' );
define( 'LOGGED_IN_SALT',    'RVnkWVXs$$7dI#i+Qg@};^}.2Tt bCC5SV$Qy_u6 ,X5K :RciZXn6%8oTc5}kjR' );
define( 'NONCE_SALT',        'WtqYFa=/T#oxCp=]_`2S,ML |DdHu%N{JhB4gv~xk_Rm?0d3Y]Y.t69h1aCbK7Z>' );
define( 'WP_CACHE_KEY_SALT', 's6kG[`D;.v FO26yfN(iYl/<Bh7wPn,rG4K0s@It7KCLTV$Y2xO>VZZ9N6jog*& ' );


/**#@-*/

/**
 * WordPress database table prefix.
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
// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
// define( 'SCRIPT_DEBUG', true );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
define( 'WP_HOME', 'https://aiwise.test' );
define( 'WP_SITEURL', 'https://aiwise.test' );
define( 'WP_REDIS_DISABLE_BANNERS', 'true' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
