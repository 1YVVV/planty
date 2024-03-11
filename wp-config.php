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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          'JK$xwY[}_ES`+^cm)rw%gZ+c(W2J64+^VrlIV_7v4iy0TH%}4``KGUbT]qLVjmsj' );
define( 'SECURE_AUTH_KEY',   'ht&,9^Kdp~pHpvPBmIb!,aI UW)K$phx,GK=#>9Te_]g,Xo0u2{(7{:GOI02?ntI' );
define( 'LOGGED_IN_KEY',     'H:z3f_SH)FPWi2i_bnp*T^loTK3{gr~_e]YMN*$&1&_hIuu`Z*?$J2jz _V>E9Ie' );
define( 'NONCE_KEY',         'Y}KAO|{!L4i7f@Az|?5/E[<-)NrASTr}GBJC}d)%+H/(I/7GrHG9 Q0:24>188Wi' );
define( 'AUTH_SALT',         'lJ&E5=>dZz;_;?SF[jmHTXpYvD,j-T)^$,2X=a(vjrtvqh-@ovmLKvGOH{%]09z ' );
define( 'SECURE_AUTH_SALT',  '2a2x1!Qrts~{%QKxm0&8D2#V^wSSZ{3 e=[s9_18~;4qA^~{O)_D#OG{@xz{sS%R' );
define( 'LOGGED_IN_SALT',    ':,?Kr^gq;<Mm;-KY,q&[+r].iL9v0NT=i1acJ1NV?P>$.&rTib4y.}4}v0>l>vI+' );
define( 'NONCE_SALT',        '=#W@Tg)m)f{]4&TrDLF{UF$bG5q[3[hSR-I,=d3.hmBk1*JYf<y3sYkJ^,cV7XW7' );
define( 'WP_CACHE_KEY_SALT', '1,#EJzn9*IbsUV~jI,Rb9.(h/p)T1dX=B<]=%wMJ2@I[k/:_+M`F<>%9v3ILC1kL' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
