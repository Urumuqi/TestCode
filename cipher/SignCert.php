<?php
/**
 * self sign cert.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

$subject = [
    'commonName' => 'zsshuo.com'
];

// gen private key pair
$privateKey = openssl_pkey_new([
    'private_key_type' => OPENSSL_KEYTYPE_EC,
    'curve_name' => 'prime256v1',
]);

// gen csr
$csr = openssl_csr_new($subject, $privateKey, ['digest_alg' => 'sha384']);

// gen self signed cert
$x509 = openssl_csr_sign($csr, null, $privateKey, $days = 180, ['digest_alg' => 'sha384']);
openssl_x509_export_to_file($x509, 'ecc-cert.pem');
openssl_pkey_export_to_file($privateKey, 'ecc-private.key');
