<?php
//session_start();
$params = explode('/', $_SERVER['REQUEST_URI']);

//function ob_html_compress($buf) {
//    return preg_replace(array('/<!--(.*)-->/Uis', "/[[:blank:]]+/"), array('', ' '), str_replace(array("\n", "\r", "\t"), '', $buf));
//}
//
function siteURL() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'] . '/';
    return $protocol . $domainName;
}

define('SITE_URL', siteURL());

//
////ob_start("ob_html_compress");
//
define('BASE_DIR', __DIR__. '/');
define('VIEW', BASE_DIR. '/application/views/');
define('PAGE', BASE_DIR.'/application/views/pages/');
define('CONTROLLER', BASE_DIR. '/application/controllers/');
define('MODEL', BASE_DIR.'/application/models/');
define('ASSETS', SITE_URL . 'assets/');
define('URL_ARRAY', 2);
define('ROOT_URL', '//localhost/digitalsignage/');
//
require_once(CONTROLLER . 'router.php');
//ob_end_flush();