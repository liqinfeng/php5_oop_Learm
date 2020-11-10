<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/4
 * Time: 18:03
 */

include_once ("ShopProduct.php");
class CdProduct extends ShopProduct
{
    private $playLength;

    public function __construct(string $title, string $firstName, string $mainName, float $price, int $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getSummaryLine()
    {
        $base = "{$this->title} ( {$this->productMainName}, ";
        $base .= "{$this->productFirsName} )";
        $base .= ": page count - {$this->playLength}";
        return $base;
    }


}

$product2 = new CdProduct("Exile on Coldharbour Lane", "The", "Alabama 3", 10.99, 0, 60.33);
print "artist: {$product2->getSummaryLine()}";
