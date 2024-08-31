<?php
/**
 * Plugin Name: Plugin TWAK.TO
 * Plugin URI: https://github.com/drajathasan/slims-tawk.to
 * Description: Plugin Chat
 * Version: 1.0.0
 * Author: Drajat Hasan
 * Author URI: https://t.me/drajathasan
 */
use SLiMS\Config;
use SLiMS\Plugins;
$plugins = Plugins::getInstance();

Config::getInstance()->load(__DIR__ . '/config/');

$plugins->registerMenu('system', 'Widget', __DIR__ . '/pages/configuration');
$plugins->register(Plugins::CONTENT_BEFORE_LOAD, function($opac) {
   $opac->js = config('twak-to-js');
});