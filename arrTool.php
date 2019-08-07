<?php

$reportParam = array(
    'from'               => 1, // const A_BORROW = 1;const A_RETURN = 2;const A_ORDER_DETAIL = 3;
    'order_number'       => '', // 订单号
    'uid'                => '', // 用户id
    'battery_id'         => '', // 电池id --
    'device_id'          => '', // 机柜id --
    'slot_seq'           => '', // 卡槽位置 --
    'business_id'        => '', // 门店id --
    'fault_type'         => 'other', // 异常类型,other,charger,cabinet
    'fault_arr'          => array('code' => 'name'), // 用户上报异常类型数组
    'fault_report'       => true, // 标识正常，异常上报,true 异常上报，false 正常上报 --
    'desc'               => '', // 用户描述 --
    'pic_info'           => [], //
    'time'               => time() // 用户上报时间
);

// 电池信息
$batteryBaseInfo = array(
    'uuid' => '',
    'type_id' => '',
    'sn' => '',
    'business_status' => '',
    'available_status' => '',
    'status' => '',
    'transaction_status' => '',
);

$payload = [
    'product_verson' => 'essential',
    'code_verson' => 'v1.3',
    'sensitive_data_source' => 'local',
    'effective_time' => [
        'start_time' => '2019-08-01 00:00:00',
        'end_time' => '2020-01-01 00:00:00',
    ],
    'operator_info' => [
        'guid' => 'DB9FA38B-D153-298F-E28A-2C87ee5770E1',
        'code' => 'operator1',
        'name' => '天府核桃科技有限公司',
        'is_open' => '1',
        'operator_token' => 'operator1',
        'domain' => '',
        'db' => 'sfo_db',
        'cellphone' => '18380447995',
        'contacts_person' => 'Harry Zhao',
        'contacts_phone' => '18582317909',
        'contacts_email' => '1@1.com',
        'opening_bank' => '中国建设银行',
        'opening_bank_account' => '天府核桃科技有限公司',
        'logo' => '',
        'maintenance' => '0',
        'company' => '天府核桃科技有限公司',
        'created_at' => '2019-08-05 14:56:43',
        'updated_at' => '2019-08-05 14:56:43',
    ],
    'operator_admin' => [
        0 => [
            "guid"=> "8485D7FD-D4CB-73FD-4728-1DAA90562CBD",
            "no"=> "6000282",
            "username"=> "邓丽芳",
            "nickname"=> "邓丽芳",
            "avatar"=> "https:\/\/wx.qlogo.cn\/mmopen\/vi_32\/Q0j4TwGTfTLtZvbOWWopA3J7Q6dicoGLbVY18JibtOOA0uud01QsEV1H2oP7PRyu6TgbzgtsdBxwSLbA1owUEujw\/132",
            "gender"=> 2,
            "phone"=> "18582317909",
            "email"=> "denglf@walnut.im",
            "status"=> 1,
            "last_login_time"=> 1562296190,
            "impl_type"=> 0
        ],
        1 => [
            "guid"=> "2168A38E-2335-E812-AFCE-450632AA4AE5",
            "no"=> "3657523",
            "username"=> "刘磊",
            "nickname"=> "刘磊",
            "avatar"=> "https:\/\/wx.qlogo.cn\/mmopen\/vi_32\/Q0j4TwGTfTLtZvbOWWopA3J7Q6dicoGLbVY18JibtOOA0uud01QsEV1H2oP7PRyu6TgbzgtsdBxwSLbA1owUEujw\/132",
            "gender"=> 2,
            "phone"=> "18010536827",
            "email"=> "liulei@spacesforce.com",
            "status" => 1,
            "last_login_time" => 1562296190,
            "impl_type" => 1
        ],
    ],
    'permissions_buy' => [
        'super_create',
        'create_customer_and_clue_and_contract',
        'create_customer',
        'super_create_clue',
        'create_contract',
        'create_brochure',
        'system_settings',
        'operator_basic_information_configuration',
        'get_operator_information',
        'edit_operator_information',
        'project_list',
        'organization',
        'get_dept_and_person_list',
        'create_dept',
        'edit_dept',
        'delete_dept',
        'enable_or_disable_people',
        'create_person',
        'edit_person',
        'delete_person',
        'dept_person_batch_import',
        'dept_person_batch_export',
        'quick_create_person',
        'role_management',
        'get_role_list',
        'create_role',
        'edit_role',
        'delete_role',
        'copy_role',
        'config_role_permission',
        'authorized_role',
        'business_approval',
        'get_review_scene_list',
        'create_review_scene',
        'edit_review_scene',
        'delete_review_scene',
        'enable_or_disable_review_scene',
        'dashboard',
        'dashboard_project_board',
        'dashboard_management_board',
        'dashboard_operation_board',
        'business_management',
        'business_overview',
        'rent_control_profile',
        'brochure',
        'all_brochure_list',
        'edit_brochure',
        'publish_unpublish_brochure',
        'share_brochure',
        'delete_brochure',
        'view_quotation',
        're_quote',
        'ignore_quotation',
        'housing',
        'all_housing_list',
        'floor_management',
        'new_housing',
        'edit_housing',
        'delete_housing',
        'housing_batch_import',
        'housing_batch_export',
        'merge_housing',
        'split_housing',
        'edit_housing_batch',
        'delete_housing_batch',
        'customer_tracking_crm',
        'crm_analysis',
        'get_customer_lists',
        'view_only_my_data',
        'view_all_data_for_the_project',
        'view_customer_details',
        'edit_customer',
        'edit_clue',
        'delete_or_reopen_clue',
        'follow_clue',
        'lost_clue',
        'create_or_edit_or_delete_clue_follow_reminder',
        'contract_management',
        'contract_analysis',
        'get_contract_list',
        'get_contract_detail',
        'edit_contract',
        'invalidate_contract',
        'renew_contract',
        'surrender_contract',
        'print_contract',
        'complete_surrender',
        'bill_management',
        'bill_analysis',
        'get_bill_list',
        'bookkeeping_list',
        'get_bill_detail',
        'bill_receipt',
        'refunded_received_payment',
        'bill_payment',
        'close_or_open_bill',
        'create_reduction',
        'invalidate_bookkeeping_record',
        'batch_collection',
        'batch_refund',
        'batch_reduction',
        'config_management',
        'base_config',
        'crm_config',
        'rent_config',
        'bill_base_config',
        'housing_config',
    ],
    'deployment_method' => 'cloud',
    'project_areas' => '100000',
    'building_count' => '1',
];

echo json_encode($payload), PHP_EOL;

// echo json_encode($batteryBaseInfo) . PHP_EOL;

# 订单kafka配置， 指定版本参数
// group.id = "jiedian_slot_event_crm"
// api.version.request = "false"
// broker.version.fallback = "0.8.2.1"
// enable.auto.commit = "true"
// auto.commit.interval.ms = 1000
// auto.offset.reset = "error"
// offset.store.sync.interval.ms = 1000
// offset.store.method = "broker"

// echo urlencode('www.mydreamplus.com/mdptimes/15362449789951') . PHP_EOL;

$p = ['members' =>  [
    0 => [
        'guid' => '7C9CE248-76ED-1692-3C6D-CA3CC0F48EE9',
        'stat' => 'opened',
    ],
    1 => [
        'guid' => 'D804FD89-C767-FA6A-AEC1-3AF9C95EF098',
        'stat' => 'opened',
    ],
    2 => [
        'guid' => 'FC814083-3967-4972-F9AC-353D4C261124',
        'stat' => 'opened',
    ],
    3 => [
        'guid' => 'C2E6ADB9-CB81-9089-4686-31BFFAFA3EED',
        'stat' => 'opened',
    ],
    4 => [
        'guid' => 'C20BACB5-3888-B52E-0A92-1F1101FAF2C5',
        'stat' => 'closed',
    ],
]];

// echo json_encode($p), PHP_EOL;
