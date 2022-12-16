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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gqgxzrdp_fovet_main' );

/** Database username */
define( 'DB_USER', 'gqgxzrdp_fovet_main' );

/** Database password */
define( 'DB_PASSWORD', 'LN@9!fZDwzFT' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'mB@9!wd1@e?S{|=nr_zH Ag|(MI0OT8VE7pPSwZ;6}2}srZ$X#<eN7@C)M=g2X=B' );
define( 'SECURE_AUTH_KEY',  '?jYe+qO(@`JIoO8KdQ}L}3s|||ai7Bt%Y[eK!Te6i-y|7!2hHX83xHf^Dj.Na6@/' );
define( 'LOGGED_IN_KEY',    'pxW//toIMfyFutfRC@z@J!FY)}|,Y9X}!a[/DNx0KhiWc[[R5,72|RDmfGw^;?~q' );
define( 'NONCE_KEY',        'aF1,f[ >j_Ast(ra@h4c++U7mFPd)|z5Fj.H[4?gt`R6Cr~:[ZJ*3>M.?,(H{$88' );
define( 'AUTH_SALT',        'U(s[e-@<kp?QEa;8P>>)~3oC6gSWs,E<GRR({0G;MHDdV%x :iF1>xwFNdF}-!:T' );
define( 'SECURE_AUTH_SALT', 'UhDFj?gOXjEv8H1p-&LJ[NGQMwk!zWISnzVTF-<m(-b*Gi*L8N2?CT3iuto+2FU%' );
define( 'LOGGED_IN_SALT',   '?=Si-168]-M]/GPJw62,E9JaQnC[pzP*9I&;H4]Lsr6@pru<8HGh[wt]jIhy1Q=I' );
define( 'NONCE_SALT',       'oT^?bjUK=T)H]_H%LGb.C:9eLIiw.wg`dV9l%ZkNYOa8vX4_^cy#,i-0&wP31a/N' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
