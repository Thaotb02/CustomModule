<?php
namespace AHT\Checkout\Controller\Index;

use Magento\Checkout\Model\Session as CheckoutSession;

class SaveQuote extends \Magento\Framework\App\Action\Action
{
     /**
     * @var CheckoutSession
     */
    private $checkoutSession;

     /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Quote\Model\QuoteRepository $quoteRepository
     */
    private $_quoteRepository;

    /**
     * @param \Magento\Framework\Controller\Result\JsonFactory
     */
    private $_jsonFactory;

    /**
     * @param \Magento\Framework\Serialize\Serializer\Json
     */
    private $_json;

    /**
     * @param \Magento\Quote\Model\QuoteFactory
     */
    private $_quoteFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magento\Framework\Serialize\Serializer\Json $json,
        \Magento\Quote\Model\QuoteFactory $quoteFactory,
        \Magento\Quote\Model\Quote $quote,
        CheckoutSession $checkoutSession
     )
     {
         $this->_pageFactory = $pageFactory;
         $this->_quoteRepository = $quoteRepository;
         $this->_jsonFactory = $jsonFactory;
         $this->_json = $json;
         $this->_quoteFactory = $quoteFactory;
         return parent::__construct($context);
         $this->quote = $quote;
         $this->checkoutSession = $checkoutSession;
     }
         /**

        * @return int

    */

   /**
     * Checkout quote id
     *
     * @return int
     */
    public function getQuoteId()
    {
        return (int)$this->checkoutSession->getQuote()->getId();
    }

      /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
     public function execute()
     {

        $data = $this->getRequest()->getContent();
        $data2 = $this->_json-> unserialize($data);


        $date = $data2['date'] ;
        $content= $data2['comment'];
        // $quoteId = $data2['quoteId'];
        $id = $this->getQuoteId();
        $quote = $this->_quoteRepository->get($id);
        $quote->setData('delivery_date', $date);
        $quote->setData('delivery_comment', $content);
        $this->_quoteRepository->save($quote);
     }
}
