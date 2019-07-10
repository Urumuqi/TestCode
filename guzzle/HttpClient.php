<?php
/**
 *
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

class HttpClient
{

    /**
     * guzzle client.
     *
     * @var GuzzleHttp\Client
     */
    private $client;

    /**
     * contrutor.
     *
     * @param string $baseUri
     */
    public function __construct($baseUri)
    {
        $this->client = new Client(['base_uri' => $baseUri]);
    }

    /**
     * post request.
     *
     * @param string $path
     * @param array $options
     *
     * @return ResponseInterface
     */
    public function post($path, $options = [])
    {
        return $this->client->request('POST', $path, $options);
    }

    /**
     * get request.
     *
     * @param string $path
     * @param array  $options
     *
     * @return ResponseInterface
     */
    public function get($path, $options = [])
    {
        return $this->client->request('GET', $path, $options);
    }
}

// test
// $cli = new HttpClient('https://oapi.dingtalk.com/gettoken?appKey=dingc629e2f4a2f36706&appsecret=ding5ttibxnsv1fxkfgy');
$url = 'https://oapi.dingtalk.com/gettoken?appkey=ding5ttibxnsv1fxkfgy&appsecret=eIR9a-wdDCIYMvHOHXKr_3MZyNuIF63-a8mS58FNuYVYeIsn7Uj1T-4Kgz8rhRrw';
$cli = new HttpClient($url);
// $client = new Client();
// $resp = $client->request('GET', $url);
// echo $resp->getBody(), PHP_EOL;
// echo date('Y-m-d H:i'), PHP_EOL;
$response = $cli->get('');

// $respBody = $response->getBody();
// var_dump($response->getBody());
$body = $response->getBody();
print_r(json_decode($body, true));
