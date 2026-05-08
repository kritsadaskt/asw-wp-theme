<?php
define( 'WP_CACHE', true ); // Added by WP Rocket
define('WP_MEMORY_LIMIT', '256M');
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
define( 'DB_NAME', 'dev_base' );
/** Database username */
define( 'DB_USER', 'dev_base' );
/** Database password */
define( 'DB_PASSWORD', 'dmJKRx7X' );
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
define( 'AUTH_KEY',         '5FdkN8,D+&cSWb%V=FL3uQe3m!}+|j@q[.kk+5h#V4YvNg&u&q*$t;2CrZ6Q#=)V' );
define( 'SECURE_AUTH_KEY',  's/^)L<ep2/BOz{t&E;N#ug-~jKr0 f(1[GpRwV6a6c2)AZvhn0t08R+a:;bO}9!K' );
define( 'LOGGED_IN_KEY',    '2:Wh(cv]kSf(c@8#L>Z;I@(/e[gbX+&SMn!eFE$ERp8glS+SVm#w|D-b:;5s*qsy' );
define( 'NONCE_KEY',        'P3e$V][dP5 kB]-p|7Q&`p!%yV]SFG!TnaPAGyI25_a6[Zbe|6/<0]i+FCZy`GCs' );
define( 'AUTH_SALT',        'uW1L4P_uT0v1tY}Pymtz4O?Zu#^`Lc*^UQo^(ik$h?J<cb}HYj!(vUZLEhXKu#pl' );
define( 'SECURE_AUTH_SALT', '}3+WTb poX]T5e7>!^}akpVP0)u2Qt*VlW ~-Y|&6poLql)&a9wMCV7>#=O!.{>]' );
define( 'LOGGED_IN_SALT',   'zq<`Xk7 k5ul&p~)K)be;icSp^nSyBH%xWT[P_;6ac^:_W.R{;#;tw3!I%hSB`XE' );
define( 'NONCE_SALT',       'P!_6G|qD4P0 L#kFs^J0-}vaj7@%7|@84FmU9l`sE/k`fuR*H&[ADui7[p-MM?-4' );
/**#@-*/
/**
* WordPress database table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'asset_';
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
// define( 'WP_DEBUG', true );
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';