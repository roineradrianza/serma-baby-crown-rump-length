<?php
/*
Plugin Name: Longitud fetal (Céfalo - Caudal) - Ser Madre
Description: Este plugin muestra un formulario para calcular la longitud fetal. Utilice el shortcode [serma-baby-crl-wp]
Version: 1.0.0
Requires at least: 5.1
Requires PHP: 7.2
Author: Ser Madre
Developer: Roiner Adrianza
Author URI: http://sermadre.com
License: GPL v3
*/

if (!defined('ABSPATH')) {
    exit;
}
//Exit if accessed directly

define('SERMA_BABY_CRL_FILE', __FILE__);
define('SERMA_BABY_CRL', dirname(SERMA_BABY_CRL_FILE));
define('SERMA_BABY_CRL_URL', plugin_dir_url(SERMA_BABY_CRL_FILE));
define('SERMA_BABY_CRL_DB_VERSION', '1.0');
define('SERMA_BABY_CRL_VERSION', '1.0.0');

define('SERMA_BABY_CRL_ENV', false);

if (SERMA_BABY_CRL_ENV) {
    @ini_set('display_errors', 1);
}

require_once SERMA_BABY_CRL . "/Controller/Main.php";
