<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/4
 * Time: 17:13
 */

class ConReader
{
    public function getValues(array $default = null)
    {
        $values = [];

        $values = array_merge($default, $values);
        return $values;
    }
}
