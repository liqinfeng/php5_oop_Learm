<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/10
 * Time: 17:56
 */

trait PriceUtilities
{
    private $taxrate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
    }
}
