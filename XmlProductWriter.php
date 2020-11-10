<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2020/11/6
 * Time: 18:06
 */
include_once ("ShopProductWriter.php");
class XmlProductWriter extends ShopProductWriter
{
    public function write()
    {
        // TODO: Implement write() method.
        $witer = new XMLWriter();
        $witer->openMemory();
        $witer->startDocument('1.0', 'Utf-8');
        $witer->startElement("products");
        foreach ($this->product as $shopProduct)
        {
            $witer->startElement("product");
            $witer->writeAttribute("title", $shopProduct->getTitle());
            $witer->startElement("summary");
            $witer->text($shopProduct->getSummaryLine());
            $witer->endElement();
            $witer->endElement();
        }
        $witer->endElement();
        $witer->endDocument();
        print $witer->flush();
    }
}

