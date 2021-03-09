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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'IaJSZ9xyQVahVH7My9N9WPf5BQQg30+HJitqBjMl6N2Wg/PR0e9jfVhrgHE/ShWOz0BLZWXsW2RkAqnKWVO9Yw==');
define('SECURE_AUTH_KEY',  '04pvF8p+lBpO1aFzPdD7o+4kPdo8wOBhHtRxfCF2jBBj9M5IiCl3EuDTtEJBikaAFIczAMjzfU4l/jaDyN2TLg==');
define('LOGGED_IN_KEY',    'obVLwJ+Nt9tzUYKxhd/JALkBrloARqubPpXav1Ny84QvKVIGazFRDkz6qo93MnzPUdFmxXEqHphiFEalsoJGBg==');
define('NONCE_KEY',        '4CAqnqUZzRTR+fWgomvYiY8OyRJurw7QzFVkv9StnyqVWSQh5BGpp4gJTZtMkaAFpLVqbm8Kzesd/f4zaYuCIg==');
define('AUTH_SALT',        'oFn1AlKKSWV0xPW/nkqK+PrBI8Fvp8dMiILzhZo2Lc8syaC2cF/XTsyw2A25vbSJ73+hZIIx6uVHiBtFplJURA==');
define('SECURE_AUTH_SALT', 'VQsnY4IdNGbfpXuxiS4Q/DcSDRi+oSgva7wobTBmg0advTzZ+mXunbSDZ+DHVAzl5yzhw+JTwYYMEZC7dmA0+w==');
define('LOGGED_IN_SALT',   'WuFDiA0fWFrrcEotcw27YP5KBv/hJYS1twjD5At54rK3mzapxSsiOPCtQEAHA6WDEYWMV1Bp+aF1HmaLDMIeYA==');
define('NONCE_SALT',       'w0n2qAZVlY2XMAM1NiKmuuXcZB4C/dEnzcn+NQb0UMkQNiM0UAv2U+JAgW9o85vsC9vVUe4NbLj0VTDhAzcW5A==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
