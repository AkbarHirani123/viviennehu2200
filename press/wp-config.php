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
define('DB_NAME', 'viv1524204530429');

/** MySQL database username */
define('DB_USER', 'viv1524204530429');

/** MySQL database password */
define('DB_PASSWORD', 'j2T@2Etn');

/** MySQL hostname */
define('DB_HOST', 'viv1524204530429.db.9820080.hostedresource.com');

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
define('AUTH_KEY',         'bHI*16%=YG9bz3 T$f_F');
define('SECURE_AUTH_KEY',  '!yD4PA4nVMWj9dFbT pM');
define('LOGGED_IN_KEY',    '*H1jEaQVZ=#%aU)mGmjh');
define('NONCE_KEY',        '/b3=r$Ydspz0aVs$#zRs');
define('AUTH_SALT',        'f&k@V#G#LJ2=mTm0D_yp');
define('SECURE_AUTH_SALT', ')M/g @m0s@7*%bd MRak');
define('LOGGED_IN_SALT',   'QqTL4qGaL7S$D99YWI&f');
define('NONCE_SALT',       '&HzD=!mqstm@M84(&A c');

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
