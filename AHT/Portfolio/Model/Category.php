<?php
namespace AHT\Portfolio\Model;

use \Magento\Framework\DataObject\IdentityInterface;
use AHT\Portfolio\Api\Data\CategoryInterface;

class Category extends \Magento\Framework\Model\AbstractModel implements IdentityInterface, CategoryInterface{

    const CACHE_TAG = 'aht_portfolio_cate';

    protected $_cacheTag = 'aht_portfolio_cate';

    protected $_eventPrefix = 'aht_portfolio_cate';

    public function __construct(
     \Magento\Framework\Model\Context $context,
     \Magento\Framework\Registry $registry,
     \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
     null,
     \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
     null,
     array $data = []
    ) {
     parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    
    public function _construct() {
    $this->_init('AHT\Portfolio\Model\ResourceModel\Category');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        $this->setData('id', $id);
    }
     
    public function getName()
    {
        return $this->getData('name');
    }
    public function setName($name)
    {
        $this->setData('name', $name);
    } 

}

