<?php

/**
 * 机柜丢失率.
 */
class DeviceLost
{
    /**
     * 获取机柜丢失率
     *
     * @param string $providerId 服务商id
     * @param string $startDate  账期开始时间
     * @param string $endDate    账期结束时间
     *
     * @return void
     */
    public function getDeviceLostRate($providerId, $startDate, $endDate)
    {
        // TODO 统计账期内丢失的机柜数,根据最后一天上线机柜数计算机柜丢失率
        return 0;
    }
}
