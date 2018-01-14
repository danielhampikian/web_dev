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
define('DB_NAME', 'wordpress-db');

/** MySQL database username */
define('DB_USER', 'daniel');

/** MySQL database password */
define('DB_PASSWORD', 'JakeDan4');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|C1 63D2 n9.)^qGg<%-aC5q}[tz,;<Of?J>1I%NQ:H?+TZzjk.+wkK!J<beIRp}');
define('SECURE_AUTH_KEY',  'yjp]-0^ltut#!m+$TVA5iw3n8)h}-bD]L*9,, Xn[-YAI(FNP^UUO SIx/@A7K<Z');
define('LOGGED_IN_KEY',    'nc~XG2 TveSn84^&<i+R&U&h5l9%SA?Xa!1xE!U_k{{Ps,)OpY!%YW@rM?Pe1uHZ');
define('NONCE_KEY',        'U+: EXD7J,FPF1.d9ieN19Z(bU--$8;g,^i3/CCS&zE0O/~]kon!+>X>6M5g}yXw');
define('AUTH_SALT',        'v_wYYN;!hcXC>MG:4!S;NZ-WJ1-(D~]Yl=Tko)Jvd_(3-bs*A3ASanbkI~~grC4q');
define('SECURE_AUTH_SALT', '$uFr#^K)D@F7$hW-/(65Pdez9=+zl?$E>)3]8|sW&-NLOxr-=2O&(1EeP$g`!VA0');
define('LOGGED_IN_SALT',   'Lo5un<b_x!|JX!wta X:^|rxy/,jD Htq|wsrhF7.H5yuQvhuQ!Nt1,^hggfO)BD');
define('NONCE_SALT',       'kht?`{{&]C54_Pm97O}UK+KAa/d{~lX|@<_B~fmE3JM-+.)Z>;8=V=}WuFnQ _2<');
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
