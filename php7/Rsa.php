<?php
/**
 * PHP 非对称加解密.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

class Rsa
{

    // private key
    protected $privKey;
    // public key
    protected $pubKey;
    // prviate public key pair
    protected $keyPair;

    public function __construct()
    {
        //
    }

    /**
     * generate rsa key pair.
     *
     * @param array $args
     *
     * @return $this
     */
    public function genKeyPair($args = [])
    {
        // TODO 生成密钥对
        $this->keyPair = openssl_pkey_new($args);
        $this->privKey = openssl_pkey_get_private($this->keyPair);
        $this->pubKey = openssl_pkey_get_public($this->keyPair);
        return $this;
    }

    /**
     * get public key source.
     *
     * @return source
     */
    public function getPublicKey()
    {
        return $this->pubKey;
    }

    /**
     * get private key source.
     *
     * @return source
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * export key to string.
     *
     * @param source $key
     * @param string $out
     *
     * @return boolean
     */
    protected function exportKey($key, &$out)
    {
        return openssl_pkey_export($key, $out);
    }
}

// test
$rsa = new Rsa();
$publicKey = $rsa->genKeyPair()->exportPublicKey();
echo $publicKey, PHP_EOL;
