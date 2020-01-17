<?php
/**
 * Plugin Name: Core Plugin
 * Plugin URI: http://sauri.pw
 * Description: Core Plugin
 * Version: 1.0
 * Author: Akinay Sau <akinay.sau@gmail.ru>
 * Author URI: http://sauri.pw
 * License: MIT
 * Text Domain: core-plugin
 * Domain Path: /l10n
 */

use Dotenv\Dotenv;
use Sau\WP\Core\Kernel;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

include __DIR__.'/vendor/autoload.php';
(Dotenv::createImmutable(__DIR__))->load();

//Load translate
add_action(
    'plugins_loaded',
    function () {
        load_plugin_textdomain(getenv('PLUGIN_TEXTDOMAIN'), false, dirname(plugin_basename(__FILE__)).'/l10n/');
    }
);

$debug = defined('WP_DEBUG') ? WP_DEBUG : false;
if ($debug) {
    $whoops = new Run;
    $whoops->appendHandler(new PrettyPageHandler);
    $whoops->register();
}

$kernel = new Kernel(__DIR__, $debug);
$kernel->run();

add_action(
    'admin_enqueue_scripts',
    function () {
        wp_enqueue_style(
            'core-plugin__default',
            plugin_dir_url(__FILE__).'/assets/core-plugin__default.css',
            false,
            '1.0.0'
        );
    }
);
