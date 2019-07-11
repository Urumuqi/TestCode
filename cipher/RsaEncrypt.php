<?php
/**
 * ras 数据加密.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

class RsaEncrypt
{

    protected $privateKey;

    protected $publicKey;

    public function __consturct()
    {
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function initKeyPair()
    {
        $resource = openssl_pkey_new();
    }

}
