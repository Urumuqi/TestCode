<?php

interface Validator
{
    // public $obj;

    // public function v1(...$params)
    // {
    //     // TODO
    // }

    // public function validate(...$params)
    // {
    //     // do something.
    // }

    public function validate();
}

// 装修
class DecorationValidator implements Validator
{
    public function validate()
    {
        // do somthing
    }
}

// 免租期

// 固定比例

// 固定金额


class Factory
{
    public static function getValidator($type = 'type')
    {
        $va;
        switch ($type) {
            case 'type':
                $va = new DecrationValidator();
                break;
            default:
                // do ......
        }

        return $va;
    }
}

abstract class BaseValidator
{
    //
}

// 装修
class DecrationValidator extends BaseValidator
{
    public function validate()
    {
        //  do something
    }
}
