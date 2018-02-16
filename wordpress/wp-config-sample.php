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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'o2GfQHfY-Abh}GX2|`yJHjr/iT2Np:8uG~b8quQte]J`kn,~(5AgIkQ%5zMwDG_N');
define('SECURE_AUTH_KEY',  'I3n51Ih-b=hS+!s(FGmtOI6^Yqr4dwXEp8KH9@X8W,~Ip-[CtJH&.6Ck%Qp1)x *');
define('LOGGED_IN_KEY',    'f$1&XmJMT.Bv4&$rB+3dA[CrTj@O`|=,Hw{+7Q2sNxua5iCUH%U) -ypwLM<&bX+');
define('NONCE_KEY',        '1*nMVokwH2PM+@<`An1Jd|C@-(6h3Hn HPa0z+Gqho|}?vs$~UJtligl(|uKzu[5');
define('AUTH_SALT',        '(9%zu| LI0%<s6#*ZCB+d,*zqMan$ewCRAyA<?jRa*9nG4Ij8yX(O+Q3)6btG$Hx');
define('SECURE_AUTH_SALT', '9|FMnj@f?|/_-X=QY5sC }!7O<fIq 0ag.]Z#;<K=M7??BxrfH%-#GnqbZaSNOIX');
define('LOGGED_IN_SALT',   ']F|SPIlWJ}=Wa=67v/$ YaQkVHNp<Y-*Hq$6*{)_DnSnS1^6E>iGA0N*k=y6VOYP');
define('NONCE_SALT',       '~3&)p@Q#$r=~pW5x*/1}bkT8x.U|fcso%+C-s[zx)ic+Zj)!+StW27(z<GiSV|>V');

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
