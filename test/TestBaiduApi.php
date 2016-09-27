<?php

require_once __DIR__.'/../src/BaiduApi.php';

$Api = new \yishuixm\apistore\BaiduApi();


//print_r($Api->datatiny_cardinfo_cardinfo('',''));
//print_r($Api->apistore_idservice_id('',''));

print_r($Api->apistore_mobilenumber_mobilenumber('',''));