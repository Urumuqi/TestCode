<?php

/**
 * 分成比例计算工厂.
 */
class Factory
{
    // 分成比例服务.
    protected $service;

    /**
     * 获取计算分成比例服务.
     *
     * @param array $config 初始化配置参数
     *
     * @return $this
     */
    public static function getService($config = array())
    {
        return $this;
    }

    /**
     * 获取分成比例.
     *
     * @return float
     */
    public function getPercentage()
    {
        return 0;
    }
}
