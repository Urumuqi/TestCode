<?php
/**
 * Sharding规则，街电支付sharding是512张表，64个库，4个数据库实例，即每个数据库实例16个数据库，每个数据库8张表.
 *
 * @author wenqiang tao<wenqiangt@jumei.com>
 */
namespace Util;

/**
 * Class ShardingRule
 * @package Model
 */
class ShardingRule extends \Db\ShardingRule
{

    // Sharding的表总数
    const SHARDING_TABLE_NUM = 512;
    // 每个DB中包含的数据表数量
    const SHARDING_DB_TABLE_NUM = 8;
    // Sharding的每个实例的数据库数量
    const SHARDING_DB_NUM = 16;

    // 进行Sharding的数字
    protected $shardingNum = 0;

    protected $cfgPrefix = '';

    /**
     * 构造方法.
     *
     * @param integer $shardingNum 用于进行Sharding的数值，通常是UID，具体要看实际场景是根据什么进行的sharding.
     *
     * @throws \Exception Invalid Sharding Number.
     */
    public function __construct($shardingNum, $cfgPrefix)
    {
        // shardingkey取后四位
        $shardingNum = strval($shardingNum);
        if (strlen($shardingNum) > 4) {
            $shardingNum = substr($shardingNum, -4);
            $shardingNum = ltrim($shardingNum, '0');
            $shardingNum = intval($shardingNum);
        }
        // 检测给定的UID是否是有效的非负整数
        // 这里的UID可以是0,以便于只知道sharding不知道UID的场景可以使用
        if (filter_var($shardingNum, FILTER_VALIDATE_INT) === false || $shardingNum < 0) {
            throw new \Exception('Invalid Sharding Number.');
        }
        if (!in_array($cfgPrefix, array_keys(\Config\DbSharding::SHARDING_PREFIX))) {
            throw new \Exception("CFG PREFIX Error");
        }
        $this->shardingNum = $shardingNum;
        $this->cfgPrefix = \Config\DbSharding::SHARDING_PREFIX[$cfgPrefix];

    }

    /**
     * 获取sharding后的表名或表的Index.
     *
     * @param string $table Sharding 前的表名.
     *
     * @return string.
     */
    public function getTableName($table = '')
    {
        if (preg_match("/\_[0-9]+$/", $table)) {
            \Base\Log::inst()->error(array('desc' => 'Sharding Table Error', "table" => $table));
            throw new \Exception("Sharding Table ".$table." Error");
        }
        if ($table) {
            return $table.'_'.($this->shardingNum % self::SHARDING_TABLE_NUM);
        } else {
            return $this->shardingNum % self::SHARDING_TABLE_NUM;
        }
    }

    /**
     * 获取sharding后的数据库名.
     *
     * @param string $db 数据库前缀.
     *
     * @return string.
     */
    public function getDbName($db = '')
    {
        return $db.'_'.floor($this->shardingNum % self::SHARDING_TABLE_NUM / self::SHARDING_DB_TABLE_NUM);
    }

    /**
     * 获取sharding后的服务器配置项名/服务器名.
     *
     * @return string.
     */
    public function getCfgName()
    {
        // 表->数据库 8进制 数据库->服务器/实例 4进制
        return $this->cfgPrefix.floor($this->shardingNum % self::SHARDING_TABLE_NUM / self::SHARDING_DB_TABLE_NUM / self::SHARDING_DB_NUM);
    }

    public function getShardingNo()
    {
        return $this->shardingNum % self::SHARDING_TABLE_NUM;
    }

}