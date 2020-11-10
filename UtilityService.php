<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/10
 * Time: 18:48
 */
include_once ("Service.php");
include_once ("PriceUtilities.php");
class UtilityService extends Service
{
    use PriceUtilities;
}

$p = new UtilityService();
print $p->calculateTax(100);