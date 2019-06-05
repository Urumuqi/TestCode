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
$cli = new HttpClient('http://154.85.15.18:9527');
$response = $cli->post('', [
    'form_params' => [
        'birthday' => date('Y-m-d H:i'),
        'sex' => 'male'
    ]
]);

// $respBody = $response->getBody();
// var_dump($response->getBody());
$body = $response->getBody();
print_r(json_decode($body, true));
