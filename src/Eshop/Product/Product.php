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

    public function __construct(string $title, Category $category)
    {
        $this->title = $title;
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }
}
