<?php
/**
 * 文件读取类.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

/**
 * class ReadFile
 */
class ReadFile
{
    /** 文件句柄 */
    protected $fp = null;

    /**
     * constructor.
     *
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        if (empty($fileName)) {
            throw new \Exception('文件名为空[' . __CLASS__ . ']初始化失败!');
        }
        if (($this->fp = fopen($fileName, 'r')) === false) {
            throw new \Exception('文件' . $fileName . '打开失败');
        }
    }

    public function readFile($offset, $step)
    {
        $t = '';
        $row = '';
        $count = 0;
        while (!feof($this->fp)) {
            // fseek($this->fp, $offset, SEEK_SET);
            // $offset ++;
            $t = fgets($this->fp);
            $tmpRow = $this->shapeBody($t);
            var_dump($tmpRow);
            exit;
            $count ++;
            // $row .= $t;
        }
        echo $count . PHP_EOL;
        // $row = str_replace(array(' ', "\n"), '', $row);
        // $row = explode('|', $row);
        // // 去掉头部， 去掉尾部
        // unset($row[0]);
        // $row = array_values($row);
        // unset($row[count($row) - 1]);
        // $row = array_values($row);
    }

    /**
     * 年份过期.
     *
     * @param int $year
     * @param int $week
     * @param int $weekDay
     *
     * @return bool
     */
    public function isBatteryExpired($year, $week, $weekDay)
    {
        $nowDate = strtotime('-1 year', strtotime(date('Y-m-d')));
        $t0 = date('Y', $nowDate) . date('W') . date('w');
        $yearN = $this->getYear($year);
        $t1 = $yearN . $week . $weekDay;
        var_dump($t0, $t1);
        return $t0 >= $t1 ? false : true;
    }

    /**
     * 根据sn标识获取年份.
     *
     * @param $year
     *
     * @return false|int|string
     */
    public function getYear($year)
    {
        $r = date('Y');
        switch ($year) {
            case 'A':
                $r = 2015;
                break;
            case 'B':
                $r = 2016;
                break;
            case 'C':
                $r = 2017;
                break;
            case 'D':
                $r = 2018;
                break;
            case 'E':
                $r = 2019;
                break;
            default:
                break;
        }
        return $r;
    }

    /**
     * 处理行数据，返回电池sn.
     *
     * @param string $rowStr
     *
     * @return string
     */
    public function shapeBody($rowStr = '')
    {
        $rowStr = str_replace(array(' ', "\n"), '', $rowStr);
        // 去掉字符串头部/尾部的“|”
        $rowStr = ltrim($rowStr, '|');
        // $rowStr = rtrim($rowStr, '|');
        $row = explode('|', $rowStr);
        return $row[0];
    }

    /**
     * destruct.
     */
    public function __destruct()
    {
        if (!is_null($this->fp)) {
            fclose($this->fp);
        }
        $this->fp = null;
    }
}

$readFile = new ReadFile('/home/wq/VirtualBoxShare/用户故障反馈/xd806_2.txt');
$r = $readFile->isBatteryExpired('C', 32, 6);
var_dump($r);
// $readFile->readFile(0, 10);
// $t = 'B261AF109F';
// $subStr = substr($t, 4, 2);
// echo $subStr . PHP_EOL;
// echo date('w') . PHP_EOL;
