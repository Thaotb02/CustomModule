<?php

namespace AHT\Portfolio\Api;

interface CategoryRepositoryInterface
{
    /**
     * Save Cate.
     *
     * @param \AHT\Portfolio\Api\Data\CategoryInterface $cate
     * 
     * @return \AHT\Portfolio\Api\Data\CategoryInterface
     */
    public function save(\AHT\Portfolio\Api\Data\CategoryInterface $cate);

    /**
     * Get object by id
     *
     * @return \AHT\Portfolio\Api\Data\CategoryInterface
     */
    public function getById(String $id);

    /**
     * Get All
     * 
     * @return \AHT\Portfolio\Api\Data\CategoryInterface
     */
    public function getList();
    
    /**
     * Create category.
     *
     * @param \AHT\Portfolio\Api\Data\CategoryInterface $cate
     * 
     * @return \AHT\Portfolio\Api\Data\CategoryInterface
     */
    public function createCate(\AHT\Portfolio\Api\Data\CategoryInterface $cate);

    /**
     * Update category
     *
     * @param String $id
     * @param \AHT\Blog\Api\Data\CategoryInterface $cate
     * 
     * @return null
     */
    public function updateCate(String $id, \AHT\Portfolio\Api\Data\CategoryInterface $cate);

    /**
     * Delete category by ID.
     *
     * @param string $cateId
     * @return \AHT\Portfolio\Api\Data\CategoryInterface
     */
    public function deleteById($cateId);

        /**
     * Delete block.
     *
     * @param \AHT\Portfolio\Api\Data\CategoryInterface $cate
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\AHT\Portfolio\Api\Data\CategoryInterface $cate);

}

