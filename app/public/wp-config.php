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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
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
define('AUTH_KEY',         'gESbWFsxKcZub+afVNoZ7W0dRHRaxWEPRzYabR3ggW5Iz14XY3RSFBOPSFS4wDzOlMnNWACc8ORC+z2T6+kdIg==');
define('SECURE_AUTH_KEY',  'gr0o7Bd6o0NJbjcpBIEd7HGama1JJ0u6LWLnq93IX8WrEx+mGc0XGEF8J/RgURaOLdsgR75g6rZh5/XrVhl53A==');
define('LOGGED_IN_KEY',    'GtgwGwz64oYZ6Qul0SfGdM6HineZYr/vVo3kz9z9mUzs5dwErvvSUJIyVv21HIFhE1kDba8/AM+fQF4pj7GvKg==');
define('NONCE_KEY',        'vNZxIJpumbo5GIHa/E+pK4wDSFNdkO2UNtOVlXfMwo+yzdmeHP9OgNNIo2qIBB2JfjRN6/BsUFoBqSGy0dM3DQ==');
define('AUTH_SALT',        '3loe7qz99ZRgl6SXaTKaRq0EJKkjmT+PCDkDZXt8E8ejXDtLgz7kQtILdjf4OctoeteG/EFITX1laY/iM7bRdw==');
define('SECURE_AUTH_SALT', '77tnQRL9MR6JX+EtIjAC3GR6gIfp7aaH4jgbfszscX+mE/wtmhQ/yJIpPtarPsUkc1ZVpKwvfk7WXPUXn+SAsQ==');
define('LOGGED_IN_SALT',   'JxHNaai2XIVwRE8ShdjJ+v6iGGr0uCdp0+re7ahSGYKqexqI0noM43KhK4utJkt7y7woUFj8CddVdJTIkh9Gcg==');
define('NONCE_SALT',       'p+S+DD/H+IVgrdW1VRv9hRcOV0ENSmWhjNHvLFAXpBaxdnmoO8iXmxR/YWb8ZRawRwQ/6KZ1qI9N/D6b9meFXw==');

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
