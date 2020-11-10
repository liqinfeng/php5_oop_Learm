<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/4
 * Time: 12:36
 */

abstract class ShopProductWriter
{
    private $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }


    abstract public function write();
//    public function write()
//    {
//        $str = "";
//        foreach ($this->products as $shopProduct)
//        {
//            $str .= "{$shopProduct->title}: ";
//            $str .= $shopProduct->getProducer();
//            $str .= "({$shopProduct->getPrice()})\n";
//        }
//        print $str;
//    }



}
