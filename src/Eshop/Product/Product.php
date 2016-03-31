<?php

namespace Eshop\Product;

class Product
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var Category
     */
    private $category;

    /**
     * @param string   $title
     * @param Category $category
     */
    public function __construct(string $title, Category $category)
    {
        $this->title = $title;
        $this->category = $category;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }
}
