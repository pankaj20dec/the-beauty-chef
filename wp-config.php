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
define('DB_NAME', 'wp_the_beauty_chef');

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
define('AUTH_KEY',         'Fm:|=it-uYvoNDX<=t <YCw<=G-hOUsilUFaT?InB0G{S$mW3rfR0S1`Ob9|#:q(');
define('SECURE_AUTH_KEY',  '0mo6&+##0*R`|3IP/5@;P]u[#>5]NyAB$Fd$_&WW5&rv*lp%M&*1My|K)XQF-uX}');
define('LOGGED_IN_KEY',    'f;2_`o@ZR72dqwj(L#HHiS#WR{TR |<3MucZ|*9/nn<a csO7q^VX?.a3n AARO@');
define('NONCE_KEY',        'WN@d%A-R]Ei#uRFh|.3r!h*: _TeXVoZX#Ds0yNJ~EC.Lf9C@O]hrjls9Y:?yK+r');
define('AUTH_SALT',        'Kh||hTSr1%F-a$_6nLfUQIyfMV`xg1W,_R[y9#UE5W|m$KwfEt7BD-Pm{N5HuUK)');
define('SECURE_AUTH_SALT', '{dzLid:F[8YGWgZ;~52VAS0@34},3k$:EwVkPp,Q r^t!KYtPA(u6q*JX`@OZ|O>');
define('LOGGED_IN_SALT',   '4J+Uqn,IO:,grBp.wFl1?:yj5J&;ivh!uP~e|RuS2}wY)pH{Z{0Jr;>&Al@-3>Z@');
define('NONCE_SALT',       'V};()K3Fe)n^v :O_y0Ur%B=+sd&QCSti|CLpjS[_-uYNsx7MZ<bWA1(/.O~=(@x');

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
