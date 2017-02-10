<?php
/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 16-9-22
 * Time: 下午4:28
 */
define ( 'INIT_PATH', str_replace ( '\\', '/', __DIR__ ) );
define ( 'APP_PATH', substr ( INIT_PATH, 0, strrpos ( INIT_PATH, '/' ) ) );
define ( 'CORE_PATH', APP_PATH . "/core/" );
define ( 'VENDOR_PATH', APP_PATH . "/vendor/" );
define ( 'WEB_DOMAIN', "myphp.t.me" );
set_include_path ( get_include_path () . PATH_SEPARATOR . CORE_PATH . PATH_SEPARATOR . VENDOR_PATH );

require_once APP_PATH . '/vendor/autoload.php';
