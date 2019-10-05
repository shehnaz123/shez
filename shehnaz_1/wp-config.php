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
define( 'DB_NAME', 'mhPatnY930' );

/** MySQL database username */
define( 'DB_USER', ' mhPatnY930' );

/** MySQL database password */
define( 'DB_PASSWORD', 'OGHZCt7EvQ' );

/** MySQL hostname */
define( 'DB_HOST', 'remotemysql.com' );

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
define( 'AUTH_KEY',         'f!3XS(Le2Uf(Ue,|Pz@#!M/Bg&A}=h8Ot~NYr)B)SZwAn^=ZkrDz ~A*15}U~aU(' );
define( 'SECURE_AUTH_KEY',  'K{7cEj@mz|z%(dNx@mv/}~IKxBR+Xg4h;.s|aT%@}v+kY!dp6rzSm+Byu0#:;ysw' );
define( 'LOGGED_IN_KEY',    ']T9i<+Np2&bemF2H<%JX%?9Z+cU=ks2%r?3Zbl`Uw~:Gq(MbCV3`tVR0A4$1:4$F' );
define( 'NONCE_KEY',        '!qIQ8R&-A*Gm?AcAu,-bF.Phx{U]_hs0DM8`bh- d<)R[qR]<7{RXYb)*F$GkYS@' );
define( 'AUTH_SALT',        '^QEwBl^FgDSlZcj+sXLSS1yusl6spL3F>)F2M3*MoE:n=@7G1=vu,<^lJlF9OV,[' );
define( 'SECURE_AUTH_SALT', '{B`~:$$,~b*{0MoE.|)a0^;Lo#VYr3 KrVeG/St2{9Kd-Krr;Z3ij8g;+y=>`7U?' );
define( 'LOGGED_IN_SALT',   'mBLXa}[?IIox=sg%a+jU;HPQHZ,t9_QcET-YbF0<O~9@s>K>++s)@&b^:5uiZj{k' );
define( 'NONCE_SALT',       '1!Psl[C2:f9a 5iRx5l*(AWggvI@f%nwJm!Xb;!+x9Q1:SPou|yIy5ME68(.nCT ' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
