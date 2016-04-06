<?php

@ini_set('upload_tmp_dir',dirname(__FILE__).'/oc-content/tmp'); if ( @ini_get('session.save_handler') === 'files' ) @ini_set('session.save_path',dirname(__FILE__).'/oc-content/tmp');

/**
 * The base MySQL settings of genie
 */
define('MULTISITE', 0);

/** MySQL database name for genie */
define('DB_NAME', 'u937513361_upene');

/** MySQL database username */
define('DB_USER', 'u937513361_yzehu');

/** MySQL database password */
define('DB_PASSWORD', 'ubyPyzybeV');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Table prefix */
define('DB_TABLE_PREFIX', 'om8z_');

define('REL_WEB_URL', '/');

define('WEB_PATH', 'http://bazaarr.esy.es/');

?>