<?php
/**
 * php http post & get.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

class Http
{

    /**
     * constructor.
     */
    public function __construct()
    {
    }

    /**
     * http get method.
     *
     * @param string  $uri
     * @param array   $params
     * @param boolean $ssl
     *
     * @return mixed
     */
    public static function get($uri, $params = array(), $ssl = true)
    {
        return self::request($uri, $params, 'GET', $ssl, $timeout);
    }

    /**
     * http post method.
     *
     * @param string  $uri
     * @param array   $params
     * @param boolean $ssl
     * @param integer $timeout
     *
     * @return mixed
     */
    public static function post($uri, $params = array(), $ssl = true, $timeout = 15)
    {
        return self::request($uri, $params, 'POST', $ssl, $timeout);
    }

    /**
     * http request method.
     *
     * @param string  $uri
     * @param array   $params
     * @param string  $method
     * @param boolean $ssl
     * @param integer $timeout
     *
     * @return mixed
     */
    public static function request($uri, $params = array(), $method = 'POST', $ssl = true, $timeout = 30)
    {
        $ch = curl_init();
        if ($method == 'GET') {
            $uri .= '?' . http_build_query($params);
            curl_setopt($ch, CURLOPT_POST, false);
        } else {
            // post
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }
        if ($ssl) {
            // 跳过证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // 跳过域名检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        $resp = curl_exec($ch);
        if ($err = curl_error($ch)) {
            throw new \Exception($err);
        }
        curl_close($ch);
        return $resp;
    }
}

// $uri = 'http://10.27.0.244:28880/capture_a_moment';
// $params = [
//     'action_id' => '12345',
//     'camera_group_id' => '1'
// ];
// $t = Http::post($uri, $params, false);
// $t = json_decode($t, true);
// var_dump($t);
