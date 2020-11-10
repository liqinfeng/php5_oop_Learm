<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/2
 * Time: 22:05
 */
declare(strict_types = 1);
include_once "ShopProductWriter.php";
include_once "Chargeable.php";

class ShopProduct implements Chargeable
{
    private $id = 0;
    private $title = "default product";
    private $productMainName = "main name";
    private $productFirsName = "first name";
    private $texrate = 17;
    protected $price = 0;
    private $discount = 0;

    public function __construct(string $title, string $firstName, string $mainName, float $price)
    {
        $this->title = $title;
        $this->productFirsName = $firstName;
        $this->productMainName = $mainName;
        $this->price = $price;
    }

    public function setID(int $id)
    {
        $this->id = $id;
    }

    public function calculateTax(float $price): float
    {
        return (($this->texrate / 100) * $price);
    }

    public function getProducerFirstName()
    {
        return $this->productFirsName;
    }

    public function getProducerMainName()
    {
        return $this->productMainName;
    }

    public function setDiscount(int $num)
    {
        $this->discount = $num;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return ($this->price - $this->discount);
    }

    public function getProducer()
    {
        return $this->productFirsName . " " . $this->productMainName;
    }

    public function getSummaryLine()
    {
        $base = "{$this->title} ( {$this->productMainName}, ";
        $base .= "{$this->productFirsName} )";
        return $base;
    }

    public static function getInstance(int $id, \PDO $pdo): ShopProduct
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)) {
            return null;
        }

        if ($row['type'] == "book") {
            $product = new BookProduct($row['title'], $row['first_name'], $row['main_name'], (float)$row['price'], (int) $row['num_pages']);
        }elseif ($row['type'] == "cd") {
            $product = new CdProduct($row['title'], $row['first_name'], $row['main_name'], (float)$row['price'], (int) $row['playlength']);
        }else {
            $firstname = (is_null($row['first_name'])) ? "": $row['first_name'];
            $product = new ShopProduct($row['title'], $firstname, $row['main_name'], (float) $row['price']);
        }
        $product->setID((int) $row['discount']);
        return $product;
    }
}

$p = new ShopProduct("Fine Soap", "", "Bob's Bathroom", 1.33);
print $p->calculateTax(100);
//$dns = "sqlite:/" . __DIR__ . "/products.db";
//$pdo = new PDO($dns, null, null);
//$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//$obj = ShopProduct::getInstance(1, $pdo);
//
//$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
//$product2 = new ShopProduct("Exile on Coldharbour Lane", "the", "Alabama 3", 10.99);

//print_r("author: " . $product1->getProducer() . "\n");
//print_r("author: " . $product2->getProducer() . "\n");

//echo gettype($product1->price);


//$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
//
//$writer = new ShopProductWriter();
//$writer->write($product1);

//print "author: {$product1->getProducer()}\n";

//$product1 = new ShopProduct();
//$product2 = new ShopProduct();
//$product1->title = "My Antonia";
//$product2->title = "Catch 22";

