<?php

/*
Plugin Name: Core Plugin
Plugin URI: http://sauri.pw
Description: Core Plugin
Version: 1.0
Author: sau
Author URI: http://sauri.pw
License: MIT
*/

use Sau\WP\Core\Kernel;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

include __DIR__.'/vendor/autoload.php';
define('TUTMEE_PLUGIN_LANG', 'tutmee');
if ( ! defined('THEME_LANG')) {
    define('THEME_LANG', TUTMEE_PLUGIN_LANG);
}
$debug = defined('WP_DEBUG') ? WP_DEBUG : false;
if ($debug) {
    $whoops = new Run;
    $whoops->appendHandler(new PrettyPageHandler);
    $whoops->register();
}

$kernel = new Kernel(__DIR__, $debug);
$kernel->run();

add_action( 'admin_enqueue_scripts', function () {
    wp_enqueue_style( 'core-plugin__default',plugin_dir_url(__FILE__) . '/assets/core-plugin__default.css', false, '1.0.0' );
});
