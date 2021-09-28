<?php
namespace AHT\Portfolio\Model;

use AHT\Portfolio\Api\Data;
use AHT\Portfolio\Api\CategoryRepositoryInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\Portfolio\Model\ResourceModel\Category as ResourceCate;
use AHT\Portfolio\Model\ResourceModel\Category\CollectionFactory as CateCollectionFactory;
use AHT\Portfolio\Api\Data\CategoryInterface;

/**
 * Class PostRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var ResourceCate
     */
    protected $resource;

    /**
     * @var CateFactory
     */
    protected $CateFactory;

    /**
     * @var CateCollectionFactory
     */
    protected $CateCollectionFactory;

    /**
     * @var Data\PostSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceCate $resource
     * @param CateFactory $CateFactory
     * @param Data\CategoryInterfaceFactory $dataCateFactory
     * @param CateCollectionFactory $CateCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceCate $resource,
        PortfolioFactory $CateFactory,
        CateCollectionFactory $CateCollectionFactory
    ) {
        $this->resource = $resource;
        $this->CateFactory = $CateFactory;
        $this->CateCollectionFactory = $CateCollectionFactory;

    }

    public function save(CategoryInterface $cate)
    {
        try {
            $this->resource->save($cate);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }

        return $cate;
    }


    /**
     * Load Category data by given Category Identity
     *
     * @param [type] $id
     * @return \AHT\Portfolio\Model\ResourceModel\Category
     */
    public function getById($id)
    {
        $cate = $this->CateFactory->create();
        $this->resource->load($cate, $id);
        if (!$cate->getId()) {
            throw new NoSuchEntityException(__('The CMS block with the "%1" ID doesn\'t exist.', $id));
        }
        return $cate;
    }


    public function getList()
    {
        $collection = $this->CateCollectionFactory->create();
        return $collection->getData();
    }


    public function createCate(CategoryInterface $cate)
    {
        try {
            $this->resource->save($cate);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
        return json_encode(array(
            "status" => 200,
            "message" => $cate->getData()
        ));
        
    }


    public function updateCate(String $id, CategoryInterface $cate)
    {

        try {
            $objPost = $this->CateFactory->create();
            $id = intval($id);
            $objPost->setId($id);
            $objPost->setData($cate->getData());
            $this->resource->save($objPost);

            return $objPost->getData();
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
    }

    /**
     * Delete Block
     *
     * @param \AHT\Portfolio\Api\Data\CategoryInterface $cate
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(CategoryInterface $cate)
    {
        try {
            $this->resource->delete($cate);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById($cateId)
    {
        $id = intval($cateId);
        if($this->resource->delete($this->getById($id))) {
            return json_encode([
                "status" => 200,
                "message" => "Successfully"
            ]);
        }
    }
}