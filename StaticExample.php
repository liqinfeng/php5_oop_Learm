<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/5
 * Time: 15:41
 */

class StaticExample
{
    static public $aNum = 0;

    public static function sayHello()
    {
        self::$aNum++;
        print "hello (".self::$aNum.")\n";
    }
}

//StaticExample::$aNum;
StaticExample::sayHello();
StaticExample::sayHello();