<?php

namespace Eshop\Product;

class ProductCatalog
{
    private $products = [];

    public function addProducts(array $products)
    {
        $this->products = $products;
    }

    public function browseCategory(Category $category)
    {
        return array_filter($this->products, function (Product $product) use ($category) {
            return $product->getCategory() == $category;
        });
    }
}
