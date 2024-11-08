<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_custom_theme' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '&wSlI}c~ *SW)=]hNLy&i)UxHpMPtX$`eW?J-JdZ~4/{xFkRwLSek]jBW.->xGJ)' );
define( 'SECURE_AUTH_KEY',  'PP!y13/$Rcg~@47Sn),P/Y@ceGtGpQ`7nzeuD]p} Ft(L9Jf(53ii35<(.Bg}egA' );
define( 'LOGGED_IN_KEY',    'j&ed& ]!{:tp(NR*)8~ydkzYo}M2S%J?|(&L-:v(` <_K=(e6CHZ,`RoL&d5ES2H' );
define( 'NONCE_KEY',        '{:)A?lCIh{pG;MxVi;eGXq{ 8}6)pU)uW-o{D;3|G*EKl<1*?N3,eJ]]}G!D{YF+' );
define( 'AUTH_SALT',        'MpqeO(%;,k$fw72as$Y3I(9M[6}wD4^IO$P^L0>MQR0Vi_8u.R*o}nTZS| ]HwXW' );
define( 'SECURE_AUTH_SALT', 'KE oKLxaBd.ZFN8cO}i^~lJ^CDU(C^)F6[D*}Ox&pi7idG:A3$/7/tz/KfmqYmI`' );
define( 'LOGGED_IN_SALT',   '< I#G*bV-i!4/Ry?2,J(!mc] NRSAHR,zZ21AhM!46ziZuUxHK(3)<<]J^F#[!EP' );
define( 'NONCE_SALT',       'o%L[P @q8m7VgUw+p(uS[/0CM>ugpT#b(`bw[& 8j.UkDB@ !^BSB|a7,+jwjgze' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
