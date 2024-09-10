<?php
/**
 * Plugin Name: Plugin TWAK.TO
 * Plugin URI: https://github.com/drajathasan/slims-tawk.to
 * Description: Plugin Chat
 * Version: 1.0.0
 * Author: Drajat Hasan
 * Author URI: https://t.me/drajathasan
 */
use SLiMS\DB;
use SLiMS\Config;
use SLiMS\Plugins;
use SLiMS\Url;

if (!function_exists('pluginUrl'))
{
    /**
     * Generate URL with plugin_container.php?id=<id>&mod=<mod> + custom query
     *
     * @param array $data
     * @param boolean $reset
     * @return string
     */
    function pluginUrl(array $data = [], bool $reset = false): string
    {
        // back to base uri
        if ($reset) return Url::getSelf(fn($self) => $self . '?mod=' . $_GET['mod'] . '&id=' . $_GET['id']);
        
        return Url::getSelf(function($self) use($data) {
            return $self . '?' . http_build_query(array_merge($_GET,$data));
        });
    }
}

if (method_exists(Plugins::class, 'group')) {
   // Load Custom config such as csp etc
   Config::getInstance()->load(__DIR__ . '/config/');

   // Register menu as group
   Plugins::group('Tawk.to', function() {
      Plugins::menu('system', 'Pengaturan Widget', __DIR__ . '/pages/configuration.php');
   })->before(__('CONFIGURATION'));

   // Hooking some js to load by template
   Plugins::hook(Plugins::CONTENT_BEFORE_LOAD, function($opac) {
      $opac->js = str_replace('\\', '', stripslashes(config('twak-to-js', '')));
   });
} else {
   // Wis diomongi ya esih ndableg bae. Busek sisan! 😡
   DB::getInstance()->prepare('delete from plugins where id = ?')->execute([md5(__FILE__)]);
   $url = SWB . 'css/bootstrap.min.css';
   exit(<<<HTML
   <link rel="stylesheet" href="{$url}"/>
   <div class="p-5">
      <h1>Yah</h1>
      <p>Plugin TAWK.TO tidak kompatibel dengan SLiMS Anda 😔</p>
      <a href="/admin/?mod=system" class="notAJAX btn btn-primary">Kembali</a>
   </div>
   HTML);
}
