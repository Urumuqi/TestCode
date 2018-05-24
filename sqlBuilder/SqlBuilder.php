<?php

class SqlBuilder
{
    /**
     * table name.
     *
     * @var string
     */
    protected $table_name;

    /**
     * 查询字段.
     *
     * @var string
     */
    protected $sql_columns = '';

    /**
     * 查询条条件.
     *
     * @var string
     */
    protected $sql_where = '';

    /**
     * constructor.
     */
    public function __construct()
    {
    }

    /**
     * select.
     *
     * @param string $fields
     *
     * @return void
     */
    public function select($fields = '')
    {
        if ($fields) {
            $this->sql_columns = $fields;
        } else {
            $this->$sql_columns = $fields;
        }
        return $this;
    }

    /**
     * from
     *
     * @param [type] $tableName
     *
     * @return void
     */
    public function from($tableName)
    {
        $this->table_name = $tableName;
        return $this;
    }

    public function where($cond)
    {
        if (empty($cond)) {
            $this->throwException('must set a valid sql condition');
        }
        $this->sql_where = explode(' AND ', $condStr);
    }

    protected function buildWhere($cond, $logic = 'AND')
    {
        if (!is_array($cond)) {
            if (is_string($cond)) {
                $cnt = preg_match('#\>|\<|\=| #', $cond, $logic);
                if (!$cnt) {
                    $this->throwException('bad sql condition, must be a valid sql condition');
                }

            }
        }
    }

    /**
     * throw exception.
     *
     * @param string  $msg
     * @param integer $errCode
     *
     * @return void
     */
    public function throwException($msg, $errCode = 0)
    {
        throw new \Exception($msg, $errCode);
    }
}
