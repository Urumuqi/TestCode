<?php
/**
 * 测试脚本.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

// $t = '中国人,';
// echo strlen($t), PHP_EOL;

// $p = [
//     'pic' => '',
//     'realname' => '吴奇',
//     'gender' => 0,
//     'birthday' => '1993-02-26',
//     'city' => '成都市',
//     'job' => '程序员',
//     'marital_status' => '0', // 感情状态
// ];
// $p_reverse = array_flip($p);
// print_r($p_reverse);

// echo json_encode($p, JSON_UNESCAPED_UNICODE), PHP_EOL;

// 创建实施

// echo json_encode(['tags' => ['活泼', '小可爱', '大叔']], JSON_UNESCAPED_UNICODE), PHP_EOL;

// $reg = "*yii|laravel*";
// $t = preg_match($reg, 'twt_yii2,', $matches);
// var_dump($t, $matches);

// 2. 运营商基础配置
$commonConfigs = [
    'app.OPERATOR_CODE' =>  '',
    'app.SECRET_TOKEN' => '',
    'app.OPERATOR_GUID' => '',
    'app.APP_DEBUG' => 'true',
    'app.DEPLOY_PRODUCT_NAME' => '',
    'app.DEPLOY_PRODUCT_VERSION' => '',
];
// 3. 后端基础配置
$backendConfigs = [
    'app.DB_CONNECTION' => 'mysql',
    'app.DB_HOST' => 'rm-bp1687op65uekv62b.mysql.rds.aliyuncs.',
    'app.DB_PORT' => '3306',
    'app.DB_DATABASE' => '',
    'app.DB_USERNAME' => 'root',
    'app.DB_PASSWORD' => '',
];

// $tmp = array_merge($backendConfigs, $commonConfigs);
// var_dump($tmp);

// $p = [
//     'type' => 'hobby',
//     'tags' => [
//         0 => [
//             'name' => '思考',
//             'is_enabled' => 0
//         ],
//     ],
// ];

// $t = [
    // 'encrypted_data' => "9BPK/2U/MH65qjgVhHi1FpxYtZN1Qm/EOZIvRCFNg0gIUySO2WRPEmT01POo3L1qDX7gQO66/wjiXmCrvYfgyVKeEYsP2iMEAHTAt/mhSu9l3cko3a7Rc2NUtTf1CJJRag4C0X2NlDkK2CKO37gMHmQb6BrpJXG9zBlNlkWVMElc6c4RomV3TDu5xV+t3rGYY7nzwcp73iOI4/9adBbqXarW6TQZs4Xil0GfUxiE4//yVIzJL7QbwDjLTEX0T+HnvzNbSmfUKhX2b7WWJ2tqCCgMWwdK2R9uxB/fAfNdzY86aHx4oLIJMYZjQBMj2JtDTZB+zIhjFv5RqD5tftrve3NfMSox9BbKah8tk4GrX1v83LutbVgd5RbuyK4flLqUVDb132BZhz83ZqHKUm5dY/E4XXZ1unvjsL5qqTlE0rnkgBLNhcqqJiwR4ZYojXXc",
    // 'iv' => "Xy6vBoy2c7HsVsa7AeEmXg==",
    // 'session_key' => 'MY6KwGLyK/1TFy6TGH5gpw==',
    // '你期待那个ta能为你做什么？',
    // '你能为ta做什么？',
    // '你想和什么样的人谈恋爱？'
//     'qas' => [
//         [
//             "id" => 1,
//             "question" => "你期待那个ta能为你做什么？",
//             "answer" => ""
//         ],
//         [
//             "id" => 2,
//             "question" => "你能为ta做什么？",
//             "answer" => ""
//         ],
//         [
//             "id" => 3,
//             "question" => "你想和什么样的人谈恋爱？",
//             "answer" => ""
//         ],
//     ]
// ];

// $template = [
//     'type' => '通知',
//     '模版名称' => 'SpacesForce',
//     'template' => '您负责实施的${customer}的${product}的${env}已部署成功，请及时登陆系统完成测试后续工作。',
// ];

// $t = '1';
// try {
//     // return here
//     echo 'returned here', PHP_EOL;
//     $t = 2;
//     // throw new \Exception('manual exception');
//     return true;
// } catch (\Exception $e) {
//     // throw $e;
// } finally {
//     $execep = isset($e) ? true : false;;
//     echo 'in finally block', PHP_EOL;
//     var_dump($execep);
//     // $t = 3;
//     // echo $t, PHP_EOL;
// }

// echo $t, PHP_EOL;

// $p = [
//     'template_params' => [
//         'customer' => '正本联创资产管理（北京）有限公司',
//         'product' => 'AMC Essentials资产管理云基础版',
//         'env' => '试用系统',
//     ],
//     'template_code' => '',
// ];
// echo json_encode($p), PHP_EOL;
$t = ["super_create","create_customer_and_clue_and_contract","create_customer","super_create_clue","create_contract","create_brochure","system_settings","operator_basic_information_configuration","get_operator_information","edit_operator_information","project_list","organization","get_dept_and_person_list","create_dept","edit_dept","delete_dept","enable_or_disable_people","create_person","edit_person","delete_person","dept_person_batch_import","dept_person_batch_export","quick_create_person","role_management","get_role_list","create_role","edit_role","delete_role","copy_role","config_role_permission","authorized_role","business_approval","get_review_scene_list","create_review_scene","edit_review_scene","delete_review_scene","enable_or_disable_review_scene","dashboard","dashboard_project_board","dashboard_management_board","dashboard_operation_board","business_management","business_overview","rent_control_profile","brochure","all_brochure_list","edit_brochure","publish_unpublish_brochure","share_brochure","delete_brochure","view_quotation","re_quote","ignore_quotation","housing","all_housing_list","floor_management","new_housing","edit_housing","delete_housing","housing_batch_import","housing_batch_export","merge_housing","split_housing","edit_housing_batch","delete_housing_batch","customer_tracking_crm","crm_analysis","get_customer_lists","view_only_my_data","view_all_data_for_the_project","view_customer_details","edit_customer","edit_clue","delete_or_reopen_clue","follow_clue","lost_clue","create_or_edit_or_delete_clue_follow_reminder","contract_management","contract_analysis","get_contract_list","get_contract_detail","edit_contract","invalidate_contract","renew_contract","surrender_contract","print_contract","complete_surrender","bill_management","bill_analysis","get_bill_list","bookkeeping_list","get_bill_detail","bill_receipt","refunded_received_payment","bill_payment","close_or_open_bill","create_reduction","invalidate_bookkeeping_record","batch_collection","batch_refund","batch_reduction","config_management","base_config","crm_config","rent_config","bill_base_config","housing_config"];
$tt = implode("\n", $t);
echo $tt;


