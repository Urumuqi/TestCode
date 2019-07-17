<?php
/**
 * ras 数据加密.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

class Rsa
{

    protected $privateKey;

    protected $publicKey;

    protected $payload = [];

    /**
     * constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $keyPair = openssl_pkey_new();
        openssl_pkey_export($keyPair, $this->privateKey);
        $public = openssl_pkey_get_details($keyPair);
        $this->publicKey = $public['key'];
    }

    /**
     * set payload data.
     *
     * @param array $payload
     *
     * @return $this
     */
    public function setPayload($payload = [])
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * public key encrypt.
     *
     * @return string
     */
    public function publicEncrypt()
    {
        openssl_public_encrypt(json_encode($this->payload), $encrypted, $this->publicKey);
        return base64_encode($encrypted);
    }

    /**
     * private key decrypt.
     *
     * @param string $encryptedStr
     *
     * @return string
     */
    public function privateDecrypt($encryptedStr)
    {
        openssl_private_decrypt(base64_decode($encryptedStr), $decrypted, $this->privateKey);
        return $decrypted;
    }

    /**
     * private key encrypt.
     *
     * @return string
     */
    public function privateEncrypt()
    {
        openssl_private_encrypt(json_encode($this->payload), $encrypted, $this->privateKey);
        return base64_encode($encrypted);
    }

    /**
     * public key decrypt.
     *
     * @param string $encrypted
     *
     * @return string
     */
    public function publicDecrypt($encrypted)
    {
        openssl_public_decrypt(base64_decode($encrypted), $decrypted, $this->publicKey);
        return $decrypted;
    }
}

// test
$payload = [
    'subject' => 'spacesforce AMC',
    'data' => [
        'authority' => [
            'type' => 'OPERATOR',
            'value' => 'op check',
        ],
    ],
];
$rsa = new Rsa();
$encrypted = $rsa->setPayload($payload)
                ->publicEncrypt();
echo 'public encrypted : ', $encrypted, PHP_EOL;
$decrypted = $rsa->privateDecrypt($encrypted);
echo 'private decrypted : ', $decrypted, PHP_EOL;
$privEncrypted = $rsa->privateEncrypt();
echo 'private encrypted : ', $privEncrypted, PHP_EOL;
$pubDecrypted = $rsa->publicDecrypt($privEncrypted);
echo 'public decrypted : ', $pubDecrypted, PHP_EOL;
