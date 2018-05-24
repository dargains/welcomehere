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
define('DB_NAME', 'wh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'O9?^YAk&nxeCN=Tr a~?n002OXEG1-.3^kr)TCUQW]perLy)(^aXh3ND92j=q[),');
define('SECURE_AUTH_KEY',  '~4?8.ODd23Dv8<} el-CjI` !!)8o%=$V0DS<q_uP8=-bOOw+JE4J@{r`V4,AS~)');
define('LOGGED_IN_KEY',    'cH,/;n$2p%k)<<aY#<[^jFt}nmr?k/faB?Snb#EX_Y6!dF._4Y.iL?a0bQH:,6)8');
define('NONCE_KEY',        'rF6;9BpVH*XEZ0!`9o0!7^)RJeQ[=W^&]CHL>wPUA.6gF~lo%>b!lMQu0sB&AkQ0');
define('AUTH_SALT',        'z&R^?&@]qB@E;~_bR=:UJq!a!8-+9J|`M$<~ZJ.L/4,y~{: =Y%~D6)A=&KZ*4HH');
define('SECURE_AUTH_SALT', '/6=e6|>_1 }vT7JI2 TTvWiu,o,lz6#E.xInrk3hMfyG[a^?=6ZN1k%M{q>]IiiM');
define('LOGGED_IN_SALT',   '}!zH9!Y9FxPeuXx04tkB.aC:etIGX55?<orV_mHfcH<-pQ{~$7`#z0}zZ^t}l(br');
define('NONCE_SALT',       'G{RTl~@*Bt=Rk.y@y}SX$le9<(~GAdh@yOFA*Jh]-&s7oj<PkzVBGut&AV:&<z=S');

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
