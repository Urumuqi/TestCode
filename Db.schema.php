<?php

namespace Config;
if(!defined('JM_PHP_CONN_POOL_ON'))
    define('JM_PHP_CONN_POOL_ON', true);

if(!defined('JM_PHP_MYSQL_LOCAL_POOL_ON'))
    define('JM_PHP_MYSQL_LOCAL_POOL_ON', false);

if(!defined('JM_PHP_MYSQL_POOL_PROXY_ON'))
    define('JM_PHP_MYSQL_POOL_PROXY_ON', true);

class Db extends \Db\ConfigSchema {

    /**
     * 得到sql语句的log,如果线上不需要请直接把这句话删掉!
     */
    public $DEBUG = true;

    /**
     * DEBUG的等级，2要打印堆栈，1只打印sql语句
     */
    public $DEBUG_LEVEL = 1;

    /** 是否使用长链接 */
    protected $persistent = true;

    /** 连接池 */
    public $globalDSN = array(
        "write" => "#{Res.php-connectionpool.JdProxy.WriteDsn}",
        "read" => "#{Res.php-connectionpool.JdProxy.ReadDsn}",
    );

    /**
     * db read config.
     *
     * @var array
     */
    public $read = array(
        'jd_finance' => array(
            'dsn' => "#{Res.Database.Jd_finance.Read.Dsn}",
            'db' => 'jd_finance',
            'user' => "#{finance_service.db.read.username}",
            'password' => "#{finance_service.db.read.passwd}",
            'confirm_link' => true,
            'options' => array(
                \PDO::ATTR_TIMEOUT => 3,
                1002 => 'SET NAMES \'utf8mb4\'',
            )
        ),
        'jiedian_sumdb' => array(
            'dsn' => "#{Res.Database.Jiedian_sumdb.Read.Dsn}",
            'db' => 'jiedian_sumdb',
            'user' => "#{finance_service.db.read.username}",
            'password' => "#{finance_service.db.read.passwd}",
            'confirm_link' => true,
            'options' => array(
                \PDO::ATTR_TIMEOUT => 3,
                1002 => 'SET NAMES \'utf8mb4\'',
            )
        ),
        'user_sumdb' => array(
            'dsn' => "#{Res.Database.jd.sumdb.ycn-user.Read.Dsn}",
            'db' => 'ycn-user',
            'user' => "#{finance_service.db.read.username}",
            'password' => "#{finance_service.db.read.passwd}",
            'confirm_link' => true,
            'options' => array(
                \PDO::ATTR_TIMEOUT => 3,
                1002 => 'SET NAMES \'utf8mb4\'',
            )
        ),
        'cloud_sumdb' => array(
            array(
                'dsn' => "#{Res.Database.jd.sumdb.ycn-cloud.Read.Dsn}",
                'db' => 'ycn-cloud',
                'user' => "#{finance_service.db.read.username}",
                'password' => "#{finance_service.db.read.passwd}",
                'confirm_link' => true,
                'options' => array(
                    \PDO::ATTR_TIMEOUT => 3,
                    1002 => 'SET NAMES \'utf8mb4\'',
                )
            ),
        ),
        'business_sumdb' => array(
            'dsn' => "#{Res.Database.jd.sumdb.ycn-business.Read.Dsn}",
            'db' => 'ycn-business',
            'user' => "#{finance_service.db.read.username}",
            'password' => "#{finance_service.db.read.passwd}",
            'confirm_link' => true,
            'options' => array(
                \PDO::ATTR_TIMEOUT => 3,
                1002 => 'SET NAMES \'utf8mb4\'',
            )
        ),
        'ankerbox_finance' => array(
            'dsn' => "#{Res.Database.Ankerbox_finance.Read.Dsn}",
            'db' => 'ankerbox_finance',
            'user' => "#{finance_service.db.read.username}",
            'password' => "#{finance_service.db.read.passwd}",
            'confirm_link' => true,
            'options' => array(
                \PDO::ATTR_TIMEOUT => 3,
                1002 => 'SET NAMES \'utf8mb4\'',
            )
        ),
    );

    /**
     * db write config.
     *
     * @var array
     */
    public $write = array(
        'jd_finance' => array(
            'dsn' => "#{Res.Database.Jd_finance.Write.Dsn}",
            'db' => 'jd_finance',
            'user' => "#{finance_service.db.write.username}",
            'password' => "#{finance_service.db.write.passwd}",
            'confirm_link' => true,
            'options' => array(
                \PDO::ATTR_TIMEOUT => 3,
                1002 => 'SET NAMES \'utf8mb4\'',
            )
        ),
    );

    public function __construct()
    {
        $this->parseDsn($this->read);
        $this->parseDsn($this->write);
        parent::__construct();
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
