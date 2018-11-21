<?php
/**
 * 数据库配置.
 *
 * @author yaojian <jiany3@jumei.com>
 */

namespace Config;

/**
 * Class Db.
 */
class Db extends \Db\ConfigSchema
{

    public $DEBUG = false;
    public $DEBUG_LEVEL = 1;

    //是否使用长连接
    protected $persistent = true;

    // #{Res.php-connectionpool.Proxy.XXXXDsn} 如果不使用本地连接池, 则使用全局中间件;可以在子类中重写
    public $globalDSN = array(
        'write' => "#{Res.php-connectionpool.JdProxy.WriteDsn}",
        'read' => "#{Res.php-connectionpool.JdProxy.ReadDsn}"
    );

    public $read = array(
        'user' => array(
            'dsn' => "#{Res.Database.Oceanwing.Ycn-user.Read.Dsn}",
            'user' => "#{payment_service.Db.user}",
            'password' => "#{payment_service.Db.pwd}",
            'options'      => array(
                \PDO::ATTR_TIMEOUT            => 3,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\'',
            ),
            'dbname' => "ycn-user"
        ),
        'payment' => array(
            'dsn' => "#{Res.Database.Jiedian_payment.Read.Dsn}",
            'user' => "#{payment_service.Db.user}",
            'password' => "#{payment_service.Db.pwd}",
            'options'      => array(
                \PDO::ATTR_TIMEOUT            => 3,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\'',
            ),
            'dbname' => "jiedian_payment"
        ),
        'data-new' => array(
            'dsn' => "#{Res.Database.Ycn_data_new.Read.Dsn}",
            'user' => "#{payment_service.Db.user}",
            'password' => "#{payment_service.Db.pwd}",
            'options'      => array(
                \PDO::ATTR_TIMEOUT            => 3,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\'',
            ),
            'dbname' => "ycn-data-new"
        ),
        'ycn-ops' => array(
            'dsn' => "#{Res.Database.Oceanwing.Ycn-ops.Read.Dsn}",
            'db' => 'ycn-ops',
            'user' => 'ycn_swd',
            'password' =>  'YcN+Db2017Sz',
            'confirm_link' => true,
            'options' => array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\'',
                \PDO::ATTR_TIMEOUT => 3600
            )
        ),
    );
    public $write = array(
        'user' => array(
            'dsn' => "#{Res.Database.Oceanwing.Ycn-user.Write.Dsn}",
            'user' => "#{payment_service.Db.userWrite}",
            'password' => "#{payment_service.Db.pwdWrite}",
            'options'      => array(
                \PDO::ATTR_TIMEOUT            => 3,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\'',
            ),
            'dbname' => "ycn-user"
        ),
        'payment' => array(
            'dsn' => "#{Res.Database.Jiedian_payment.Write.Dsn}",
            'user' => "#{payment_service.Db.userWrite}",
            'password' => "#{payment_service.Db.pwdWrite}",
            'options'      => array(
                \PDO::ATTR_TIMEOUT            => 3,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\'',
            ),
            'dbname' => "jiedian_payment"
        ),
        'data-new' => array(
            'dsn' => "#{Res.Database.Ycn_data_new.Write.Dsn}",
            'user' => "#{payment_service.Db.userWrite}",
            'password' => "#{payment_service.Db.pwdWrite}",
            'options'      => array(
                \PDO::ATTR_TIMEOUT            => 3,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\'',
            ),
            'dbname' => "ycn-data-new"
        ),
        'key_db' => array(
            'dsn' => "#{Res.Database.Jd.KeyDb.Write.Dsn}",
            'db' => 'key_db',
            'user' => "#{payment_service.Db.userWrite}",
            'password' =>  "#{payment_service.Db.pwdWrite}",
            'confirm_link' => true, //required to set to TRUE in daemons.
            'options' => array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\'',
                \PDO::ATTR_TIMEOUT => 3
            )
        ),
        'ycn-ops' => array(
            'dsn' => "#{Res.Database.Oceanwing.Ycn-ops.Write.Dsn}",
            'db' => 'ycn-ops',
            'user' => 'ycn_swd',
            'password' =>  'YcN+Db2017Sz',
            'confirm_link' => true,
            'options'      => array(
                \PDO::ATTR_TIMEOUT            => 3,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\'',
            ),
        ),
    );

    // 双写先写老库
    public static $writeOldFirst = true;

    // 是否双写
    public static $doubleWrite = "#{payment_service.Db.doubleWrite}";

    public static $switchPayment = "#{payment_service.Db.switchPayment}";
    // 不需要双写的表
    public static $noDoubleWriteTables = "#{payment_service.Db.NoDoubleWriteTables}";


    public function __construct()
    {
        $this->parseDsn($this->read);
        $this->parseDsn($this->write);
        foreach (array('read', 'write') as $m) {
            foreach ($this->$m as $name => &$r) {
                // had parsed. or is template parsed.
                if (!isset($r['dsn'])) {
                    continue;
                }
                if (!in_array($name, array('data-new'))) {
                    $r['dsn'] = $this->globalDSN[$m];
                }
                // 使用中间件时,如果没有设置连接参数persistent,则建立PDO长连接, 提高性能
                if ($this->persistent === true && !isset($r['options'][\PDO::ATTR_PERSISTENT])){
                    $r['options'][\PDO::ATTR_PERSISTENT] = true;
                }
                $r = self::parseCfg($r);
            }
        }
        // parent::__construct();
    }

    protected function parseDsn(&$instance)
    {
        array_walk(
            $instance,
            function (&$v) {

                if (!array_key_exists('dsn', $v)) {
                    return;
                }
                // 解析DSN数据
                $dsn = trim($v['dsn']);
                $matches = array();
                if (preg_match('/dbname=([^;]+)$/', $dsn, $matches)) {
                    $v['db'] = trim($matches[1]);
                }
            }
        );
    }

}