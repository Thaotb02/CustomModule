<?php
namespace AHT\Portfolio\Plugin;

class Name
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        $result = "HelloWorld";
        return $result;
    }
}
