<?php
/**
 * 测试脚本.
 *
 * @author wuqi <qi.wu@ankerbox.com>
 */

namespace Script;

/**
 * Class Test
 */
class Test extends \Script\Base
{

    public function process()
    {
        // 导出锁定电池信息
        $cond = array(
            'r.report_code' => array(
                \Model\Crm\UserReport\ReportBatteryList::CODE_Y1520_1,
                \Model\Crm\UserReport\ReportBatteryList::CODE_Y1526,
                \Model\Crm\UserReport\ReportBatteryList::CODE_ABNORMAL_ORDER,
                \Model\Crm\UserReport\ReportBatteryList::CODE_ABNORMAL_ORDER_WITH_USER,
            ),
            'r.lock_status' => \Model\Crm\UserReport\ReportBatteryList::LOCK_STATUS_DONE,
            'r.confirm_lock' => \Model\Crm\UserReport\ReportBatteryList::CONFIRM_LOCK_OK,
            'r.status' => array(2, 3, 4,5),
        );
        $op = new \Model\DbOperator();
        $op->alias('r')
            ->join(\Model\Crm\Store::TABLE_NAME, 's', 's.uuid = r.store_id');
        $list = \Model\Crm\UserReport\ReportBatteryList::instance()->queryAllBase(
            $cond,
            'r.report_code as `锁定原因`, r.battery_sn as `电池sn`, r.device_sn as `机柜sn`, r.slot_num as `卡槽号`, r.store_id as `门店id`,'
            . 's. name as `门店名称`, s.telephone as `商家联系电话`, s.address as `门店地址`, s.province as `省份`, s.city as `城市`,'
            . 's.area as `区域`',
            $op
        );
        $storeIds = array_unique(array_column($list, '门店id'));
        $storeServices = \Model\Crm\StoreServiceV2::instance()->queryAllBase(
            array(
                'store_id' => $storeIds,
                'type' => \Model\Crm\StoreServiceV2::TYPE_MAINTAIN,
            ),
            'sub_type, provider_id, store_id'
        );
        $providerIds = $userIds = array();
        foreach ($storeServices as $service) {
            if ($service['sub_type'] == \Model\Crm\StoreServiceV2::SUB_TYPE_CHANNEL) {
                $providerIds[$service['store_id']] = $service['provider_id'];
            } elseif ($service['sub_type'] == \Model\Crm\StoreServiceV2::SUB_TYPE_KA) {
                $userIds[$service['store_id']] = $service['provider_id'];
            }
        }
        // 服务商信息
        $op2 = new \Model\DbOperator();
        $op2->assocKey('uuid');
        $providerInfos = \Model\Crm\ChannelAgentBasicInfo::instance()->queryAllBase(
            array('uuid' => array_values($providerIds)),
            'uuid, name',
            $op2
        );
        $newProviderInfos = array();
        foreach ($providerIds as $storeId => $providerId) {
            if (isset($providerInfos[$providerId])) {
                $newProviderInfos[$storeId] = array(
                    'provider_id' => $providerId,
                    'name' => $providerInfos[$providerId]['name'],
                );
            }
        }
        // 用户信息
        $userInfos = \Handler\Service\User::instance()->getUserSimpleInfoByUuid(array_values($userIds));
        $newUserList = array();
        foreach ($userIds as $storeId => $userId) {
            if (isset($userInfos[$userId])) {
                $newUserList[$storeId] = array(
                    'user_id' => $userId,
                    'name' => $userInfos[$userId]['name']
                );
            }
        }
        $newResult = array();
        $header = array(
            '锁定原因',
            '电池sn',
            '机柜sn',
            '卡槽号',
            '门店id',
            '门店名称',
            '商家联系电话',
            '门店地址',
            '省份',
            '城市',
            '区域',
            '服务商id',
            '服务商名称',
            '服务商类型'
        );
        foreach ($list as $item) {
            $storeId = $item['门店id'];
            if (isset($newUserList[$storeId])) {
                $item['服务商id'] = $newUserList[$storeId]['user_id'];
                $item['服务商名称'] = $newUserList[$storeId]['name'];
                $item['服务商类型'] = '街电BD';
            } elseif (isset($newProviderInfos[$storeId])) {
                $item['服务商id'] = $newProviderInfos[$storeId]['provider_id'];
                $item['服务商名称'] = $newProviderInfos[$storeId]['name'];
                $item['服务商类型'] = '渠道商';
            } else {
                $item['服务商id'] = '';
                $item['服务商名称'] = '';
                $item['服务商类型'] = '';
            }
            $newResult[] = $item;
        }
        if (($fp = fopen('/home/logs/bd_locked_battery.csv', 'w')) == false) {
            $this->output('文件打开失败');
        }
        fputcsv($fp, $header);
        foreach ($newResult as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);
        $this->outputSuccess();
    }
}
