<?php
/**
 * abstract class.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

abstract class AbstractObj
{
    protected $params;

    public function __construct(array $params)
    {
        $this->params = $params;

        $this->init();
    }

    public function init()
    {
        // do init job
        echo json_encode($this->params) . PHP_EOL;
    }
}

class ConcreteObj extends AbstractObj
{
    public function __construct($params)
    {
        parent::__construct($params);
    }

    public function init()
    {
        echo 'children call'. PHP_EOL;
    }
}

$obj = new ConcreteObj(['a' => 'b']);
