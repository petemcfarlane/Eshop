<?php

namespace Eshop\Product;

class Category
{
    /**
     * @var string
     */
    private $category;

    /**
     * Category constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param $category
     *
     * @return Category
     */
    public static function fromString($category)
    {
        $newCategory = new Category();

        $newCategory->category = $category;

        return $newCategory;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->category;
    }
}
