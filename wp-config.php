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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'supersmashbroz');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

const JETPACK_DEV_DEBUG = TRUE;

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'i,e/mG`.s*EbX Ly#Bz.jW(5p/.{zy!iJKO9s/{4C-Ozf#G*Evrj*jMg3|Luv>lr');
define('SECURE_AUTH_KEY',  'vI)U`9o%vM)h&eVyWncDl+Q+|e$d&f@B38E1F<[ Q|CN|5DS43hb6Gry0r({h$`J');
define('LOGGED_IN_KEY',    'I>7 CSZz[-C-xsw+,s)f$F2>n#x4`DHrB!%L4 aairl13E nPslD -J<y,im0m+s');
define('NONCE_KEY',        '1aLm_5!F|  X},gFnvK#G.)}@`:T?;d7~BY:M>b7&)~8J!>29<=-~i5v9<D$BZRO');
define('AUTH_SALT',        'cGT{]q5&{rSQju0gRCSxU%[RyM >l%oN^=B=BMk@9t%NS>k;f(4,.-Qd@4{|&IsW');
define('SECURE_AUTH_SALT', ',ZIvjIpLT8#}AA%F}ReN^T+99O01o1`GOQL^;.Dgn*kD}c[s1g*6<O`P#loxaqWV');
define('LOGGED_IN_SALT',   'DKjD;6k1ueF-I[q$HQphv}:jH!@f`L+uM;Nfb{Es_Jl pN%fQdsG3EJ:0t8b*5s-');
define('NONCE_SALT',       'z+Gu.A!MXnn-Tm]&/0Mi0SNj-*|/$Hb0-O`]PJK5lMxy8&ld+*Dy,vx]Toz_jahb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
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
