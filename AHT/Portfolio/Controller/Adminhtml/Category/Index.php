<?php 

namespace AHT\Portfolio\Controller\Adminhtml\Category;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AHT_Portfolio:category');
        $resultPage->addBreadcrumb(__('Cate1'), __('Cate2'));
        $resultPage->addBreadcrumb(__('Manage Portfolio'), __('Manage Portfolio'));
        $resultPage->getConfig()->getTitle()->prepend(__('Portfolio'));
        return $resultPage;
    } 
}

