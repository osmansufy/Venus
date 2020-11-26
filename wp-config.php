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
define( 'DB_NAME', 'venus' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=X9/9#}1mIyB$4l.k&$hJC6Qh}2sHmwE|0IK0O(HIAZs744K*Bbw$w!-9_Qm;C-z' );
define( 'SECURE_AUTH_KEY',  '&5hd+x[umXPYNt91u84`-A6cTGDh[Tvn2tI[BiR<(w) w6F%z:Wkj{gDA@2hhBbC' );
define( 'LOGGED_IN_KEY',    'O76JpB<b-MV8glu]>aBGF!469KMi2-QfyDh?VA;f4zf,9(XHc%DM8I4~e#N[GJ:^' );
define( 'NONCE_KEY',        '94l~[UHd[D/V7@Q?C;N{w}[Ba=` LK]jtV5IldA=h*qf(d_|,pE4W![w9muUuH*B' );
define( 'AUTH_SALT',        'lTri3`b#hA$]n_K1*#O,ikb=BW<ueLnweWn*>o(R:Md%*2`C{xha[0ikGs]uX*uq' );
define( 'SECURE_AUTH_SALT', '*:e:cjJlUudJ(]HBem|j,ZHE2=NrI(|d+%JN},)OyF&=Iiij&]/ BU<2QzM&,{8B' );
define( 'LOGGED_IN_SALT',   'Mxr5pCy}Fl0w+ 2PhAts-yd7h|rVOO6TE9eq2)I3$d31MVygw19*Q(s&/h&)X<Z%' );
define( 'NONCE_SALT',       'f oED<e5+:z)[~T#[0-jmGA% h&bC|K<,Z lm=%$784IZS?k1~fDiZ%Z~r%V2RHT' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
