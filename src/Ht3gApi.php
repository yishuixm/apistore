<?php
/**
 * 华唐接口
 * URL: http://apistore.baidu.com
 * Date: 2016/9/27
 * Author: 1830802211@qq.com
 */

namespace yishuixm\apistore;


class Ht3gApi
{
    private $userid;
    private $account;
    private $password;

    function __construct($userid, $account, $password){
        $this->userid = $userid;
        $this->account = $account;
        $this->password = $password;
    }

    // POST 请求
    private function curl_post($url, $post_data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
        $result = curl_exec($ch);
        return $result;
    }

    /**
     * 发送短信
     * @param $mobile 手机号码为一个数组
     * @param $content 发送的短信的内容
     * @return mixed
     */
    function sendSms($mobile, $content, $sign){
        $post_data['userid'] = urlencode($this->userid);
        $post_data['account'] = urlencode($this->account);
        $post_data['password'] = urlencode($this->password);
        $post_data['content'] = "{$content}【{$sign}】"; //短信内容需要用urlencode编码下
        $post_data['mobile'] = urlencode(implode(',',$mobile));
        $post_data['sendtime'] = urlencode(''); //不定时发送，值为0，定时发送，输入格式YYYYMMDDHHmmss的日期值
        $url='http://sms.ht3g.com/sms.aspx?action=send';
        $xml = $this->curl_post($url, $post_data);
        $result = (array)simplexml_load_string($xml);
        return [
            "accessGranted"     => $result['returnstatus'] === 'Success',
            "errors"            => $result['message']
        ];
    }
}