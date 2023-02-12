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
define( 'DB_NAME', 'asiahilux_blog' );

/** MySQL database username */
define( 'DB_USER', 'asiahilux_blog' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Blog786!*' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '+^E~dH-_!<a!oj`XX)h 0V%G;/H/q8W*(Sh=OdEEqDrL+%y<U*Px-.<wXD*IXZ],' );
define( 'SECURE_AUTH_KEY',  'PSd*A@#$]U?KO)LZ`D3BdVHko(t?c>GM,xI)QV$UZ22(/TMSo:3M.m%t@(R[ElFv' );
define( 'LOGGED_IN_KEY',    '|<&HlAL_.*JT`n<p~>I*Kp-[Kt&+H=eECx7:F1M4Oi/7+GS.suG2)1me%wJ3V|O|' );
define( 'NONCE_KEY',        '515j8=Yj`=;0|yMGL5&2wdH1:PN ^%Y{2QsL5nmXTQg$.etC3W&yEo2uGu4_Y8 l' );
define( 'AUTH_SALT',        'X<?6Yzr6e=<Y;5v9E%basDI^!,U^:j_eV2sHL1-k/p7q0$UUOR,xM]1Q&&CCh]@T' );
define( 'SECURE_AUTH_SALT', '7a^C+Rzt-g;A@4Od2)ofv}qg_%pe|0@PS9rt d$[$$~ MKU:;+J4>-rv!evR)+z7' );
define( 'LOGGED_IN_SALT',   '(^H+@P.8oi6SIB|S]IBD;EvPEczL~WHw+$K!=Opm0$HK#Di1Pf1u6}-XDD9-qU:N' );
define( 'NONCE_SALT',       ' ([U0/c)Q-z9pg3(g+-d?T8js?!%4@ADPr%-b3Hq^7;hdXh6.|=^~[:5SA9tgA$$' );

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
