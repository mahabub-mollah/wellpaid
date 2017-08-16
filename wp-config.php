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
define('DB_NAME', 'wellpaid');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', '123');

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
define('AUTH_KEY',         'm]4_8ij4DfMDxJ^<z4Yhw/Pgv{kQ:peAkHaHN4N.6LUywG_+YyL||2|;jQdQSl#`');
define('SECURE_AUTH_KEY',  'Betu8DIQ18lZHk_*=KY:D&7KLfx!?atHB}<zg B+(+s}V}l:2|:ncZu=1uK}BnR{');
define('LOGGED_IN_KEY',    '|`@ym10-5qy+eI$T~-;%oB!Sb+p4p~{zopjQe4x~imb@v6I:-ceEweg0=9PMja#x');
define('NONCE_KEY',        'r7XmI[ utZiz3|%j0kEA>BDQ|0}|Z[+b.~cFE!RU[D9C=paT|n&`mFA<:`sprr|a');
define('AUTH_SALT',        'o@, }Iv`S=tW:N~eW35lSx+Y/c s$^DoeJpJtPvL7-cXQw/i D|F(u`3Re`]5Sq(');
define('SECURE_AUTH_SALT', '3Lib:Y|Q[[KR(ZYS!>DD_Dx@}oYTPmPSJQ?qU a7A.S}Zv)I]gtzyc?LUrYb`=AA');
define('LOGGED_IN_SALT',   'i[}=P(gM=1y.wy]MkMOqEnO1M0tjP} ^wEZ{4;d;o3 8MvqJsIV&1@`^o*y=}bu0');
define('NONCE_SALT',       'Y;HX6>n=<yOF>g7n2xI-[flN])}GRs6J_u[G}:c4#4LGn>#`Qi4DKB&w^}L=dY o');

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
