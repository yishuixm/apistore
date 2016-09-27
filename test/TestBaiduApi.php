<?php

require_once __DIR__.'/../src/BaiduApi.php';

$Api = new \yishuixm\apistore\BaiduApi();


print_r($Api->datatiny_cardinfo_cardinfo('ba85fb304f7675b4ed27558f842951ef','6222620510012291052'));