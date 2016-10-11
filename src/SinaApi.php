<?php
/**
 * 新浪接口
 * URL: http://apistore.baidu.com
 * Date: 2016/9/27
 * Author: 1830802211@qq.com
 */

namespace yishuixm\apistore;


class SinaApi
{

    const API_URL = 'http://api.t.sina.com.cn/';

    protected function remoteApi($url,$headerParam,$urlParam,$postData=false){
        $ch = curl_init();
        $url = "{$url}?{$urlParam}";

        print_r($url);

        // 添加apikey到header
        if($headerParam){
            curl_setopt($ch, CURLOPT_HTTPHEADER  , $headerParam);
        }
        // 执行HTTP请求
        curl_setopt($ch, CURLOPT_URL , $url);
        if($postData){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }

        $res = curl_exec($ch);
        return $res;
    }

    /**
     * 短网址生成
     * URL: http://api.t.sina.com.cn/short_url/shorten.json?source=3271760578&url_long=http://www.douban.com/note/249723561/
     * Date: 2016/9/27
     * Author: 1830802211@qq.com
     * @param $appkey APPKEY
     * @param $url_long 长网址
     * @param $type 结果类型不用换
     */
    public function short_url($appkey, $url_long, $type='shorten.json'){
        $url = self::API_URL. __FUNCTION__."/{$type}";
        $data = [
            "source"    => $appkey,
            "url_long"  => $url_long
        ];
        return $this->remoteApi($url,false,http_build_query($data),false);
    }

}

