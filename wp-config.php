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
define('DB_NAME', 'portsea');

/** MySQL database username */
define('DB_USER', 'portsea');

/** MySQL database password */
define('DB_PASSWORD', '12345');

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
define('AUTH_KEY',         'hBX%=|YCY/>HB_X]:Kw|5]iR|lVZe5xJHDh$9aD&W+7mce%D<P#kuFy<H-z:2)L2');
define('SECURE_AUTH_KEY',  'w8`z]2w4x3q$o?*Q!8se-0;nq(=0ClM?r3jgn6;!Hz9e`)(P>O&=QO|%^29MHCfJ');
define('LOGGED_IN_KEY',    '_1:</1rz#0u~H<%CEw>kG<LMhvk.ub;AAX2|.8l2MFRvI/u-nqmX3b-.H2u[lyQk');
define('NONCE_KEY',        '/8jDH)!uIMXOm;^KKJk1H+)[VAAKm,?.*3~c=3,;Uc9mBV04{FB)j??kH1x6M!Yp');
define('AUTH_SALT',        '.lql<*$f9=qHqih|Q z#B*j%B,<M^(4[~[>M}C(&v[W$[GZCDXWjQ(QNGv|0/NQJ');
define('SECURE_AUTH_SALT', 'BvqP.DX/c7?rQ2yf//,^jiy*h8OJ{:JogrwC,uQmXr;FP1UiiF_I8t  MNl6;a^/');
define('LOGGED_IN_SALT',   '];tY`Ny?=$Q:Ne&oQ>n2{FX<vq=k(78mlRT^+4g4ES qfbo7gcfnYW2/^(fU]RP$');
define('NONCE_SALT',       '9lld/4;;Qn7UW^Gdcq<|J;X6Bzd3TUf>B>)U$p0;15_q-Z*sLMjP6P}pJgF0l-lT');

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
