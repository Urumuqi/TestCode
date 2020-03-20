<?php

// 业务实体配置列表

use Illuminate\Support\Facades\DB;

$single = [
    // 'name' => '合同管理',
    'policy' => [
        'view' => [
            'acl' => [
                'method' => 'GET',
                'route' => [
                        '/business/contract/{guid}', // 合同详情
                        '/business/contracts', // 合同列表
                    ],
            ],
            'view_code' => 'contract_view',
            'desc' => '合同查看',
            'is_selected' => true, // true|false
        ],
        'update' => [
            'acl' => [
                'method' => 'POST/PUT/PATCH',
                'route' => ['/business/contract/{guid}'],
            ],
            'view_code' => 'contract_edit',
            'desc' => '新增/编辑合同',
        ],
        'delete' => [
            'acl' => [
                'method' => 'DELETE',
                'route' => ['/business/contract/{guid}'],
            ],
            'view_code' => 'contract_delete',
            'desc' => '删除合同',
        ],
        'cancel' => [
            'acl' => [
                'method' => 'POST',
                'route' => ['/business/contract/{guid}/cancel'],
            ],
            'view_code' => 'contract_cancel',
            'desc' => '取消合同',
        ],
        'approve' => [
            'acl' => [
                'method' => 'POST',
                'route' => ['/business/contract/{guid}/approval'],
            ],
            'view_code' => 'contract_approval',
            'desc' => '审批合同',
        ],
    ]
];

$roleModules = [
    'view',
    'update',
    'cancel',
];

// $str = json_encode($single, JSON_UNESCAPED_UNICODE);
// echo strlen($str);

// demo

// class Demo
// {
//     public $name;

//     public function setName($name)
//     {
//         $this->name = $name;
//     }

//     public function getName()
//     {
//         return $this->name;
//     }
// }

// function modifyName(Demo $demo)
// {
//     $demo->setName('你大爷');
//     return '你大爷来了';
// }

// $demo = new Demo;
// $demo->setName('你大妈');

// echo $demo->getName() , PHP_EOL;

// modifyName($demo);

// echo $demo->getName() , PHP_EOL;
