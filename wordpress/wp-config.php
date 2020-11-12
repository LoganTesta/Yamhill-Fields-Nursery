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
define( 'DB_NAME', 'yamhillfieldsnursery' );

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
define( 'AUTH_KEY',         'L(6c}H>(Pg.Sc])OaBQ/BVQ.8sm7uawM[vz_BK3qgK>pCJyD2NBCoD^9S|}w$fab' );
define( 'SECURE_AUTH_KEY',  'H;c4*F=EWDSQk/b(N/1rx|>JX_01nA+se)wyXJ<be0=B3=YC?H(hj8^nsZD^<re.' );
define( 'LOGGED_IN_KEY',    '#i9s[Eon1r*veG|eI-V79TDJ4!q=I(-aK.c!2+l 2e+^F?^<gy]:tg>2>g}[I1N`' );
define( 'NONCE_KEY',        '~VyTmQX;R(={F#G)&`872~z3N##Ll|Yl1@6ASb.w%dr9lE7TjpB$bBxcq9]8t%f?' );
define( 'AUTH_SALT',        ')%]AAL]3GUe8n1pK@y0v7`qIcf`o|_W+K X$PHX`&VS)T[Ho=d!HkmVUM,N1g()D' );
define( 'SECURE_AUTH_SALT', '<[fDbIv320,Uy.=Vo)+_VO?-dErO,;T*-dO[sE`,~<?P*^Tyk)7%8wh,j,3&85,[' );
define( 'LOGGED_IN_SALT',   '(2{3lmcX)<@ys?fgI2f.UzUnhIP_W43b<?{,DoX)Baud4e;*Q]Nes8Y?b2E%lK}O' );
define( 'NONCE_SALT',       't>Pqhn@%mtWw$J?[.d0W,?S>J9PdZ,oTX47in@+`d:}./xdV}R`@(!UbDDdC$phT' );

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
