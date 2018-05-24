<?php

/**
 * 机柜拜访率。
 */
class DeviceVisit
{
    /**
     * 获取服务商机柜拜访率.
     *
     * @param string $providerId 服务商id
     * @param string $startDate  账期开始时间,eg:20180501
     * @param string $endDate    账期结束时间,eg:20180601
     *
     * @return void
     */
    public function getVisitRate($providerId, $startDate, $endDate)
    {
        // TODO 获取账期内渠道商拜访的机柜数，根据账期最后一天上线机柜数，机柜机柜拜访率
        return 0;
    }
}
