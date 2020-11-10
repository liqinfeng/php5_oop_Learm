<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/3
 * Time: 16:12
 */
declare(strict_types = 1);
class AddressManager
{
    private $addresses = ["209.131.36.159", "216.58.213.174"];

    public function outputAddresses(bool $resolve)
    {
        foreach ($this->addresses as $address)
        {
            print $address;
            echo $resolve;
            if (!is_bool($resolve))
            {

//                print " (".gethostbyaddr($address).")";
            }
            print "\n";
        }
    }
}

$settings = simplexml_load_file(__DIR__."/resolve.xml");

$manager = new AddressManager();
$manager->outputAddresses(false);


//$ss = settype($settings->resolvedomains, string);
//echo $ss;
//$res = new AddressManager();
//$res->outputAddresses(settype($settings->resolvedomains, 'boolean'));