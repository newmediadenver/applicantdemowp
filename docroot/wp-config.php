<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ============================
// database settings
// ============================
if ( ! defined( 'DB_NAME' ) )
    define( 'DB_NAME', 'demo' );
if ( ! defined( 'DB_USER' ) )
    define( 'DB_USER', 'doer' );
if ( ! defined( 'DB_PASSWORD' ) )
    define( 'DB_PASSWORD', 'doer' );
if ( ! defined( 'DB_HOST' ) )
    define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// =================
// Site and WP URL's
// =================
if ( ! defined( 'WP_SITEURL' ) ) {
    define( 'WP_SITEURL', 'http://localhost:1025/wp' );
  }
if ( ! defined( 'WP_HOME' ) ) {
  define( 'WP_HOME', 'http://localhost:1025' );
}
// ============================================
// Custom Content Directory.
// Can also change them in local/dev-config.php
// ============================================
if ( ! defined( 'WP_CONTENT_DIR' ) ) {
    define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
}
if ( ! defined( 'WP_CONTENT_URL' ) )
    define( 'WP_CONTENT_URL', WP_HOME . '/content' );



// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         '.w%LS]/LGgg^{fdz3w0}fQoPe6k T;hCiAyR{rlA=RAi~JWz+0i24b^!&aa`vGSY');
define('SECURE_AUTH_KEY',  'FpM(b,-f=U[ZM}%,YR0(>!B8ItLg*k<)c]0~!godYdd}J96+`,Cgbmye&L;:Ib$R');
define('LOGGED_IN_KEY',    'xwh`6A6X|Gpz;rE4>[K}o-%f#@3J*c)5<8ji:~HS-Wk/XOt*b)65@![# C-{GCSL');
define('NONCE_KEY',        '$16Z+)p#|jN^DXh$c!</% |*0P%1H*qGR)81}?,C[#O5C{axFS>W~rB<7G`*<:Wz');
define('AUTH_SALT',        '>wC838q9w@2u%NI)uZQW8I ;e{$EWk~<{iBs^PTofbe1t.Fthe4rM,Fu^a#r-[^H');
define('SECURE_AUTH_SALT', '_0o]WPtJosU1T.zk!nr+|yXgRXrwS`;qos|PtH}|M}t,<5>WHa53&+#4_u;?H?)|');
define('LOGGED_IN_SALT',   'D4VJ1C(a<^T;p3h=$Q#uWs;`j`)`6)-LPSdF; HJ3u._TErB<1&&74N}t/:].iDv');
define('NONCE_SALT',       '(e%&2@.`|pfa+mWi#M$/-Y[U!qRw:@c| )x=bV/BSM:s-8ayx+&kb]/7-`OcAl>m');



// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
if ( !defined( 'WPLANG' ) )
  define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
if ( !defined( 'WP_DEBUG_DISPLAY' ) )
  define( 'WP_DEBUG_DISPLAY', false );

// ============================================
// Debug mode
// Can also enable them in local/dev-config.php
// ============================================
define( 'WP_DEBUG', true );
if ( !defined( 'SAVEQUERIES' ) )
  define( 'SAVEQUERIES', true );
if ( !defined( 'SCRIPT_DEBUG' ) )
  define('SCRIPT_DEBUG', true);
if ( !defined( 'WP_ENV' ) )
  define('WP_ENV', 'development');

// =====================================
// Change Autosave Interval - in seconds
// =====================================
if ( !defined( 'AUTOSAVE_INTERVAL' ) )
  define('AUTOSAVE_INTERVAL', 240 );

// ==============================================================
// Configure Post Revisions - false if you don't want to save any
// ==============================================================
if ( !defined( 'WP_POST_REVISIONS' ) )
  define( 'WP_POST_REVISIONS', 3 ); // or false

// ========================================
// Remove Trash - In days, WP default is 30
// ========================================
define( 'EMPTY_TRASH_DAYS', 60 );

// =========================
// Increase PHP Memory Limit
// =========================
if ( !defined( 'WP_MEMORY_LIMIT' ) )
  define( 'WP_MEMORY_LIMIT', '128M' );

// =====================================
// WP - Core only updates the core files
// No Akisemet or Hello Dolly
// =====================================
if ( !defined( 'CORE_UPGRADE_SKIP_NEW_BUNDLED' ) )
  define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true );

// ===========================================
// Override default permissions
// If you want allow direct plugin downloading
// ===========================================
if ( !defined( 'FS_CHMOD_DIR' ) )
  define( 'FS_CHMOD_DIR', ( 0755 & ~ umask() ) );
if ( !defined( 'FS_CHMOD_FILE' ) )
  define( 'FS_CHMOD_FILE', ( 0644 & ~ umask() ) );


define('FS_METHOD','direct');

// ========================================
// Absolute path to the WordPress directory
// ========================================
if ( !defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', '/var/www/dac/current/docroot' . '/wp/' );
}

// ====================
// Bootstraps WordPress
// ====================
require_once( ABSPATH . 'wp-settings.php' );
