<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AHT\Portfolio\Model\Product\Attribute\Source;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;

class SaleAgentId extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $customerCollectionFactory;
    
    public function __construct(CollectionFactory $customerCollectionFactory)
    {
        $this->customerCollectionFactory =$customerCollectionFactory;
    }

    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $customerCollection = $this->customerCollectionFactory->create()->addAttributeToFilter('is_sales_agent','1');
            // echo '<pre>';
            // var_dump($customerCollection->getData());
            $this->_options=[
                ['label' => __('Choose Sale Agent'), 'value' => '']
            ];
            foreach ($customerCollection as $key => $value) {
                $data=['label' => $value->getName(),
                'value' => $value->getEntityId()];
                array_push($this->_options,$data);
            }
        }
        return $this->_options;
    }

    /**
     * @return array
     */
    public function getFlatColumns()
    {
        $attributeCode = $this->getAttribute()->getAttributeCode();
        return [
        $attributeCode => [
        'unsigned' => false,
        'default' => null,
        'extra' => null,
        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
        'length' => 255,
        'nullable' => true,
        'comment' => $attributeCode . ' column',
        ],
        ];
    }

    /**
     * @return array
     */
    public function getFlatIndexes()
    {
        $indexes = [];
        
        $index = 'IDX_' . strtoupper($this->getAttribute()->getAttributeCode());
        $indexes[$index] = ['type' => 'index', 'fields' => [$this->getAttribute()->getAttributeCode()]];
        
        return $indexes;
    }

    /**
     * @param int $store
     * @return \Magento\Framework\DB\Select|null
     */
    public function getFlatUpdateSelect($store)
    {
        return $this->eavAttrEntity->create()->getFlatUpdateSelect($this->getAttribute(), $store);
    }
}