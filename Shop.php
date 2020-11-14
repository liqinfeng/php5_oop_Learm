<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/14
 * Time: 21:46
 */

interface Shop
{
    public function buy($gid);
    public function sell($gid);
    public function view($gid);
}

class BaseShop implements Shop {
    private $pid = 0;

    public function buy($gid)
    {
        // TODO: Implement buy() method.
        echo '你购买了 ID 为：' . $this->pid = $gid  . ' 的商品';
    }

    public function sell($gid)
    {
        // TODO: Implement sell() method.
        echo '你购卖了 ID 为：' . $this->pid = $gid  . ' 的商品';
    }

    public function view($gid)
    {
        // TODO: Implement view() method.
        echo '你查看了 ID 为：' . $this->pid = $gid . ' 的商品';
    }

}
$getId = uniqid();

$b = new BaseShop();
$b->buy($getId);