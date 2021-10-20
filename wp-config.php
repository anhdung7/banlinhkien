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
define( 'DB_NAME', 'banlinhkien' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Di|Rr58xXk=X#2!a#}Pc3[W6qYedg+5nKiElV=Y6x#1qW,MgOfzAh/4Iw)P]:g({' );
define( 'SECURE_AUTH_KEY',  '7NP%5Fq9h2)=7%$jlJsMF^rz_i)odKy>~ft2?s_oj{7@b>Vt.ZWe?a:1)STt ,NL' );
define( 'LOGGED_IN_KEY',    ' :BBK2.F4viNq,s8lE|@9%FFn~9qGg{px:?5[s0u` 8BsqZnufi>HQ#v!FZ$j7W?' );
define( 'NONCE_KEY',        'Zv?R~]-uz8b~(M$2FYB:cl1N%lXrXGb/se h3:|g8O^D9xg8lo#`;A6AS2b[^<-p' );
define( 'AUTH_SALT',        'E<gH$cYi$xaaISH[~Ri;Os3yh`)=fzj-,g2UKfK@P~zcz6a2Jp?$4@KZAX}/<1]y' );
define( 'SECURE_AUTH_SALT', '7gn#%CN=f{4ywC{>](@Syu/WwQj?De#9L!,ldP3Ol&#70p;K9esHKtFtoD>wu#uN' );
define( 'LOGGED_IN_SALT',   'zR(cz4uZ,o*fnk9R5EnbKfq_a$g%@PKs%%G*F0cp=Mzt(0dMa5qZPahIQtITXcpH' );
define( 'NONCE_SALT',       ' _sDlCO<e55sfGRMza+q?2VmXJ_L}zb ^$B#A[oK8PP|+;v;VZBn3q>Jl4XL-%W7' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'blk_';

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
