<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'My-ecommerce' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'QYw3JWrmF6gvKsQpjGaQ1Lp10Evh4zQb3K5pimbwHkgPlIC9oH8Twg6AUcXtN0C3' );
define( 'SECURE_AUTH_KEY',  'vwSnsw973BPRMGSKAFWbNLZxK02KMdfejxerg9GE14QaCPSLgJt0FNJJeNV4i3OE' );
define( 'LOGGED_IN_KEY',    'iQFL2ZdXVKoxeMmCfgeauh66GPGZOcXZ3IH20DLoeMQvexA3TZG7ic6XFiywzGaG' );
define( 'NONCE_KEY',        'g0vzYkl58PjMibfdCjQn44INDj2IzoF6eOnHpK2RtDXhlQz39kMTnLAiAnTJYFQt' );
define( 'AUTH_SALT',        'Az70jMLvU8zAQZHHWOxDerOTpiWOkOJaYgj42doEKrOk2yblH22VujFxcd3DUBMb' );
define( 'SECURE_AUTH_SALT', 'A0mLU5L6rQjn4CmXlfZng8c4az6z2IKMmjGJ3dEnVeNod9ZDS311jDOUuTbm2btu' );
define( 'LOGGED_IN_SALT',   'O6V94AET5bnohL7zjx3xZSxBr0GVpxOGRi1xsRrObX6JFyYADaiBH7O6nrtSUWfj' );
define( 'NONCE_SALT',       'hFe4ohhn8KAaGFJ0T6uEUDzZ3OvVqYcoF0Wt41MctxxDr6YuS7L1ntk7drJJhv8a' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
