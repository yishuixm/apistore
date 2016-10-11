<?php
require_once __DIR__.'/../src/BaiduApi.php';
require_once __DIR__.'/../src/SinaApi.php';
require_once __DIR__.'/../src/AmapWSApi.php';

$baidu = new \yishuixm\apistore\BaiduApi();
$sian = new \yishuixm\apistore\SinaApi();
$amap_ws = new \yishuixm\apistore\AmapWSApi();

print_r($amap_ws->geocode_geo('f0d8d646afbcf4ee77b886ea1fcb8f80', '重庆市'));