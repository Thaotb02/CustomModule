<?php

namespace AHT\Portfolio\Api\Data;

interface CategoryInterface
{
	const ID = 'id';

    /**
     * Get category id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set category id
     *
     * @param int $id
     * @return @this
     */
    public function setId($id);

    /**
     * Get category name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set portfolio name
     *
     * @param string $name
     * @return null
     */
    public function setName($name);
}