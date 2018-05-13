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
define('AUTH_KEY',         '-Z9~c[K-F=#odSDnc~EQP0p2ZxZ-8gEJ]zCj#e$1k*8{m;kba#`5uWXZT^03cVrG');
define('SECURE_AUTH_KEY',  'iYPMrAXgBR)|Rc4=@^z4[?]8itsDE@sFwzLjaAwv|Tzp[:}4S[sh&)t=g_Y2=] o');
define('LOGGED_IN_KEY',    '53I<V~gA)/l{O$$%h.jLb-7-8pi94!^uA^Tt^3]-EeT~PN.g@k;[ue19lT&).HY-');
define('NONCE_KEY',        'I6OizCq=C}4< l6nvaat5<K2$*R/_AAn+z&Mg5fEUc/>^z_T=w.]3ToGByA;^&.g');
define('AUTH_SALT',        'gqE|&:&nANAG*V$I4qbG};vGIb;^0hFA(fPQ=.>BX%JC#Ja0iu-XGEmO6y/wSMeh');
define('SECURE_AUTH_SALT', 'Tyo~(s2Q98D7V[q4($Cug6_(+)vD(j.IWUz6xTV.gjd*$lQ2V-d75SyIsQjoA3p]');
define('LOGGED_IN_SALT',   'RA!6*4/x/Rab>6JM.*1^#Ta&e>]4P:K@!]%jI.Ulmm89NY}UhA,0zm8p85qoQ:*v');
define('NONCE_SALT',       ']MAgZ]3+vQjPfv]8&5oS:8$Oh>T2)`RKJ~_g  &2U0*T^|Y4_b{k2xQkaa71Vr`U');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wh_';

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
