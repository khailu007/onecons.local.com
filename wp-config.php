<?php
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'khachhang_wp_onecons' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'd@t@base' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3316' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '>?S0ng{xvlXZ^[2!(E!M:oP`wZ%G,B(HIfU50I8eD#p/67`E8 ]JMc+$@pC[0<1*' );
define( 'SECURE_AUTH_KEY',  '%I.C.%C$!S?Bq>ZJ?T9f2_W-XCS<^M13-a=+ZhvzWYpm]F^].?{o*#>)A&^4HXJG' );
define( 'LOGGED_IN_KEY',    'B}=99/enStE:2Tn;L0h48-Cd[v]=VwnH1`J2%(s.,<,dGEzk8`ND]hOfblNUH{7T' );
define( 'NONCE_KEY',        '{{Rr/*e u$Q.X.6yFU}bRi/m_KCpagQ1UZ_vap_^6EWuM){7Y!|6JY*f(_{]XN9i' );
define( 'AUTH_SALT',        'TtTeN%:?g,CEjzU~/]{A{(/CFwC_G;6WR&Ig9_Cg;z2aMPy-|j(GXsTxIZ,RG3]?' );
define( 'SECURE_AUTH_SALT', '94_c/86+tNQW*I|X4h.e&Y4*l,f:ozY_s)^VHCAF+D+:xjUjh+LP|:E#ZZ~q?JU8' );
define( 'LOGGED_IN_SALT',   '_31zaEuZrCdSdkSJU=d ]Wr6V!>wB=;+{dkzx^oVEV+=4}3f}?|W%FtL.N7u6ba{' );
define( 'NONCE_SALT',       '}o! %A5>p)g>t@4kKDslRsEda<0F}Bdd+`NtoeRkVm+.z6fb3i+b+C;Rp %O&r#s' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
