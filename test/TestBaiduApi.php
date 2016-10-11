<?php

require_once __DIR__.'/../src/BaiduApi.php';
require_once __DIR__.'/../src/SinaApi.php';

$baidu = new \yishuixm\apistore\BaiduApi();
$sian = new \yishuixm\apistore\SinaApi();


//print_r($Api->datatiny_cardinfo_cardinfo('',''));
//print_r($Api->apistore_idservice_id('',''));

//print_r($Api->apistore_mobilenumber_mobilenumber('',''));

print_r($sian->short_url('3271760578','http://www.douban.com/note/249723561/'));