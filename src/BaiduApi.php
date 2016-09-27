<?php
/**
 * 百度APISTORE
 * URL: http://apistore.baidu.com
 * Date: 2016/9/27
 * Author: 1830802211@qq.com
 */

namespace yishuixm\apistore;


class BaiduApi
{

    const API_URL = 'http://apis.baidu.com/';

    protected function remoteApi($url,$headerParam,$urlParam){
        $ch = curl_init();
        $url = "{$url}?{$urlParam}";
        $header = $headerParam;
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        return json_decode($res, true);
    }

    /**
     * 银行卡查询服务
     * URL: http://apistore.baidu.com/apiworks/servicedetail/735.html
     * Date: 2016/9/27
     * Author: 1830802211@qq.com
     * @param $apikey 百度APIKEY
     * @param $cardnum 银行卡号
     */
    public function datatiny_cardinfo_cardinfo($apikey, $cardnum){
        $url = self::API_URL.implode("/",explode('_', __FUNCTION__));
        return $this->remoteApi($url,["apikey:{$apikey}"],http_build_query(["cardnum"=>$cardnum]));
    }

    /**
     * 身份证查询
     * URL: http://apistore.baidu.com/apiworks/servicedetail/735.html
     * Date: 2016/9/27
     * Author: 1830802211@qq.com
     * @param $apikey 百度APIKEY
     * @param $cardnum 身份证号
     */
    public function apistore_idservice_id($apikey, $id){
        $url = self::API_URL.implode("/",explode('_', __FUNCTION__));
        return $this->remoteApi($url,["apikey:{$apikey}"],http_build_query(["id"=>$id]));
    }

    /**
     * 身份证查询
     * URL: http://apistore.baidu.com/apiworks/servicedetail/735.html
     * Date: 2016/9/27
     * Author: 1830802211@qq.com
     * @param $apikey 百度APIKEY
     * @param $phone 手机号码
     */
    public function apistore_mobilenumber_mobilenumber($apikey, $phone){
        $url = self::API_URL.implode("/",explode('_', __FUNCTION__));
        return $this->remoteApi($url,["apikey:{$apikey}"],http_build_query(["phone"=>$phone]));
    }


}