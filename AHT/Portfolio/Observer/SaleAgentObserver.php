<?php
namespace AHT\Portfolio\Observer;

class SaleAgentObserver implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct()
    {
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $myEventData = $observer->getData('order');
        
    }
}