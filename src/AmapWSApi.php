<?php
/**
 * 高德地图WebService接口
 * URL: http://apistore.baidu.com
 * Date: 2016/9/27
 * Author: 1830802211@qq.com
 */

namespace yishuixm\apistore;


class AmapWSApi
{

    const API_URL = 'http://restapi.amap.com/v3/';

    protected function remoteApi($url, $headerParam, $urlParam, $postData = false)
    {
        $ch = curl_init();
        $url = "{$url}?{$urlParam}";

        // 添加apikey到header
        if ($headerParam) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerParam);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($postData) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }

        $res = curl_exec($ch);
        return json_decode($res, true);
    }

    /**
     * 地理编码
     * URL: http://restapi.amap.com/v3/geocode/geo?
     * Date: 2016/9/27
     * Author: 1830802211@qq.com
     * @param $key 请求服务权限标识
     * @param $address 结构化地址信息
     * @param $city 查询城市
     */
    public function geocode_geo($key, $address, $city = '')
    {
        $url = self::API_URL . implode("/", explode('_', __FUNCTION__));
        $data['key'] = $key;
        $data['address'] = $address;
        $data['city'] = $city;
        $data['output'] = 'JSON';

        return $this->remoteApi($url,false,http_build_query($data), false);
    }

    /**
     * 地理编码
     * URL: http://restapi.amap.com/v3/geocode/regeo?
     * Date: 2016/9/27
     * Author: 1830802211@qq.com
     * @param $key 请求服务权限标识
     * @param $location 经纬度坐标
     * @param $poitype 返回附近POI类型
     * @param $radius 搜索半径
     * @param $extensions 返回结果控制
     * @param $batch 批量查询控制
     * @param $roadlevel 道路等级
     * @param $homeorcorp 是否优化POI返回顺序
     */
    public function geocode_regeo($key, $location, $poitype='',$radius='1000',$extensions='',$batch=false,$roadlevel='',$homeorcorp='0')
    {
        $url = self::API_URL . implode("/", explode('_', __FUNCTION__));
        $data['key'] = $key;
        $data['location'] = $location;
        $data['poitype'] = $poitype;
        $data['radius'] = $radius;
        $data['extensions'] = $extensions;
        $data['batch'] = $batch;
        $data['roadlevel'] = $roadlevel;
        $data['output'] = 'JSON';
        $data['homeorcorp'] = $homeorcorp;

        return $this->remoteApi($url,false,http_build_query($data), false);
    }

    /**
     * 路径规划 距离测量
     * URL: http://restapi.amap.com/v3/distance?
     * Date: 2016/9/27
     * Author: 1830802211@qq.com
     * @param $key 请求服务权限标识
     * @param $origins 出发点
     * @param $destination 目的地
     * @param $type 路径计算的方式和方法
     */
    public function distance($key, $origins,$destination,$type)
    {
        $url = self::API_URL . implode("/", explode('_', __FUNCTION__));
        $data['key'] = $key;
        $data['origins'] = $origins;
        $data['destination'] = $destination;
        $data['type'] = $type;
        $data['output'] = 'JSON';

        return $this->remoteApi($url,false,http_build_query($data), false);
    }
}