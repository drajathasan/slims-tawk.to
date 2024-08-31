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

Config::getInstance()->load(__DIR__ . '/config/');

Plugins::group('Tawk.to', function() {
   Plugins::menu('system', 'Chat', __DIR__ . '/pages/chat.php');
   Plugins::menu('system', 'Pengaturan Widget', __DIR__ . '/pages/configuration.php');
})->before(__('CONFIGURATION'));

Plugins::hook(Plugins::CONTENT_BEFORE_LOAD, function($opac) {
   $opac->js = str_replace('\\', '', stripslashes(config('twak-to-js', '')));
});