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
define( 'DB_NAME', 'u188429851_2olgZ' );

/** Database username */
define( 'DB_USER', 'u188429851_xujhA' );

/** Database password */
define( 'DB_PASSWORD', 'VylII4tDT4' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          '|^bQd[*J-Updg=ltVjE#NtJ6[*u7Nzc<]1-2_M4vSO}_u,cp{`B/1r{BM6ab#5fR' );
define( 'SECURE_AUTH_KEY',   'LwS#p^4Q[p0=is[S* J+G}mS<F{ZfV8E4Y|xXvsa:3~S}M/peFE`.MoIQQ]d!+p{' );
define( 'LOGGED_IN_KEY',     '?]U5os%06,)fzsPx~2:Eh9k0v-Mwil#9l`aDb ?]o3POK+6@iYi+gmQ_q;/&#Ful' );
define( 'NONCE_KEY',         '`6gjBRkE[,94#y{[.7sw?wi(cctG1XKUO+gz>oIC6$j=}{2`G$It!w`M86[D8N*U' );
define( 'AUTH_SALT',         'xh6>vr:Y}=q5`Eu(lO%:Ny={]=-PYlntkc=Zjud6C2f[%.]g W8q=lwkV[B`2DWP' );
define( 'SECURE_AUTH_SALT',  'byVFHg4-n.n&VINp*-ZG#rp^wl=6CG!I]O%t-5}v6xctLf:1~XKfwk3`$vskX(Fr' );
define( 'LOGGED_IN_SALT',    ':&b?+?wdhih4:LLz3+C0hA.qW6m#rh9;ES(x$LQL_#DO.7xTF3]:#%gV,e*&Nd1F' );
define( 'NONCE_SALT',        'E,G:cEj(6CCJwTBUgqVh>%U5r=JTuJ?x8_*aM(: Ez&Q+r91gW7pBX(6VGF>Nmi|' );
define( 'WP_CACHE_KEY_SALT', ' JeBH;{hNmn DosS]6XPsUNPH|B.Dqj@AV)-PrvX`V<r7Zb2R-g9vel.%2 iNf?a' );


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
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
