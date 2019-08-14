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

    const ENCRYPT_BLOCK_SIZE = 200;
    const DECRYPT_BLOCK_SIZE = 256;

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
        $tmp = openssl_pkey_get_details($this->keyPair);
        $this->pubKey = $tmp['key'];
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

    /**
     * private key encrypt plain text data.
     * the source data has been base64 encoded.
     *
     * @param string $plainData
     *
     * @return string
     */
    public function encrypt($plainData)
    {
        // private key encrypt
        $encrypted = '';
        $splits = str_split($plainData, self::ENCRYPT_BLOCK_SIZE);
        foreach ($splits as $split) {
            $encryptOK = openssl_private_encrypt($split, $partialEncrypted, $this->privKey, OPENSSL_PKCS1_PADDING);
            if (!$encryptOK) {
                return false;
            }
            $encrypted .= $partialEncrypted;
        }
        return base64_encode($encrypted);
    }

    /**
     * public key decrypt encrypted data.
     *
     * @param string $encrypted
     *
     * @return string
     */
    public function decrypt($encrypted)
    {
        // public key decrypt
        $decrypted = '';
        $splits = str_split(base64_decode($encrypted), self::DECRYPT_BLOCK_SIZE);
        foreach ($splits as $split) {
            $decryptOK = openssl_public_decrypt($split, $partialDecryptd, $this->pubKey, OPENSSL_PKCS1_PADDING);
            if (!$decryptOK) {
                return false;
            }
            $decrypted .= $partialDecryptd;
        }
        return $decrypted;
    }
}

// test
$payload = '{"product_verson":"essential","code_verson":"v1.3","sensitive_data_source":"local","effective_time":{"start_time":"2019-08-01 00:00:00","end_time":"2020-01-01 00:00:00"},"operator_info":{"guid":"DB9FA38B-D153-298F-E28A-2C87ee5770E1","code":"operator1","name":"\u5929\u5e9c\u6838\u6843\u79d1\u6280\u6709\u9650\u516c\u53f8","is_open":"1","operator_token":"operator1","domain":"","db":"sfo_db","cellphone":"18380447995","contacts_person":"Harry Zhao","contacts_phone":"18582317909","contacts_email":"1@1.com","opening_bank":"\u4e2d\u56fd\u5efa\u8bbe\u94f6\u884c","opening_bank_account":"\u5929\u5e9c\u6838\u6843\u79d1\u6280\u6709\u9650\u516c\u53f8","logo":"","maintenance":"0","company":"\u5929\u5e9c\u6838\u6843\u79d1\u6280\u6709\u9650\u516c\u53f8","created_at":"2019-08-05 14:56:43","updated_at":"2019-08-05 14:56:43"},"operator_admin":[{"guid":"8485D7FD-D4CB-73FD-4728-1DAA90562CBD","no":"6000282","username":"\u9093\u4e3d\u82b3","nickname":"\u9093\u4e3d\u82b3","avatar":"https:\\\/\\\/wx.qlogo.cn\\\/mmopen\\\/vi_32\\\/Q0j4TwGTfTLtZvbOWWopA3J7Q6dicoGLbVY18JibtOOA0uud01QsEV1H2oP7PRyu6TgbzgtsdBxwSLbA1owUEujw\\\/132","gender":2,"phone":"18582317909","email":"denglf@walnut.im","status":1,"last_login_time":1562296190,"impl_type":0},{"guid":"2168A38E-2335-E812-AFCE-450632AA4AE5","no":"3657523","username":"\u5218\u78ca","nickname":"\u5218\u78ca","avatar":"https:\\\/\\\/wx.qlogo.cn\\\/mmopen\\\/vi_32\\\/Q0j4TwGTfTLtZvbOWWopA3J7Q6dicoGLbVY18JibtOOA0uud01QsEV1H2oP7PRyu6TgbzgtsdBxwSLbA1owUEujw\\\/132","gender":2,"phone":"18010536827","email":"liulei@spacesforce.com","status":1,"last_login_time":1562296190,"impl_type":1}],"permissions_buy":["super_create","create_customer_and_clue_and_contract","create_customer","super_create_clue","create_contract","create_brochure","system_settings","operator_basic_information_configuration","get_operator_information","edit_operator_information","project_list","organization","get_dept_and_person_list","create_dept","edit_dept","delete_dept","enable_or_disable_people","create_person","edit_person","delete_person","dept_person_batch_import","dept_person_batch_export","quick_create_person","role_management","get_role_list","create_role","edit_role","delete_role","copy_role","config_role_permission","authorized_role","business_approval","get_review_scene_list","create_review_scene","edit_review_scene","delete_review_scene","enable_or_disable_review_scene","dashboard","dashboard_project_board","dashboard_management_board","dashboard_operation_board","business_management","business_overview","rent_control_profile","brochure","all_brochure_list","edit_brochure","publish_unpublish_brochure","share_brochure","delete_brochure","view_quotation","re_quote","ignore_quotation","housing","all_housing_list","floor_management","new_housing","edit_housing","delete_housing","housing_batch_import","housing_batch_export","merge_housing","split_housing","edit_housing_batch","delete_housing_batch","customer_tracking_crm","crm_analysis","get_customer_lists","view_only_my_data","view_all_data_for_the_project","view_customer_details","edit_customer","edit_clue","delete_or_reopen_clue","follow_clue","lost_clue","create_or_edit_or_delete_clue_follow_reminder","contract_management","contract_analysis","get_contract_list","get_contract_detail","edit_contract","invalidate_contract","renew_contract","surrender_contract","print_contract","complete_surrender","bill_management","bill_analysis","get_bill_list","bookkeeping_list","get_bill_detail","bill_receipt","refunded_received_payment","bill_payment","close_or_open_bill","create_reduction","invalidate_bookkeeping_record","batch_collection","batch_refund","batch_reduction","config_management","base_config","crm_config","rent_config","bill_base_config","housing_config"],"deployment_method":"private","project_areas":"100000","building_count":"1"}';
$payloadEncoded = base64_encode($payload);
$rsa = new Rsa();
$encrypted = $rsa->genKeyPair()->encrypt($payloadEncoded);
echo $rsa->getPublicKey(), PHP_EOL;
// $decrypted = $rsa->decrypt($encrypted);
echo $encrypted, PHP_EOL;
// echo base64_decode($decrypted), PHP_EOL;

