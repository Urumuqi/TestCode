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

$p = [
    'type' => 'hobby',
    'tags' => [
        0 => [
            'name' => '思考',
            'is_enabled' => 0
        ],
    ],
];

$t = [
    // 'encrypted_data' => "9BPK/2U/MH65qjgVhHi1FpxYtZN1Qm/EOZIvRCFNg0gIUySO2WRPEmT01POo3L1qDX7gQO66/wjiXmCrvYfgyVKeEYsP2iMEAHTAt/mhSu9l3cko3a7Rc2NUtTf1CJJRag4C0X2NlDkK2CKO37gMHmQb6BrpJXG9zBlNlkWVMElc6c4RomV3TDu5xV+t3rGYY7nzwcp73iOI4/9adBbqXarW6TQZs4Xil0GfUxiE4//yVIzJL7QbwDjLTEX0T+HnvzNbSmfUKhX2b7WWJ2tqCCgMWwdK2R9uxB/fAfNdzY86aHx4oLIJMYZjQBMj2JtDTZB+zIhjFv5RqD5tftrve3NfMSox9BbKah8tk4GrX1v83LutbVgd5RbuyK4flLqUVDb132BZhz83ZqHKUm5dY/E4XXZ1unvjsL5qqTlE0rnkgBLNhcqqJiwR4ZYojXXc",
    // 'iv' => "Xy6vBoy2c7HsVsa7AeEmXg==",
    // 'session_key' => 'MY6KwGLyK/1TFy6TGH5gpw==',
    // '你期待那个ta能为你做什么？',
    // '你能为ta做什么？',
    // '你想和什么样的人谈恋爱？'
    'qas' => [
        [
            "id" => 1,
            "question" => "你期待那个ta能为你做什么？",
            "answer" => ""
        ],
        [
            "id" => 2,
            "question" => "你能为ta做什么？",
            "answer" => ""
        ],
        [
            "id" => 3,
            "question" => "你想和什么样的人谈恋爱？",
            "answer" => ""
        ],
    ]
];

// strpos
$t = 'app';
$t1 = strpos('app.operator_code', $t);
var_dump($t1);