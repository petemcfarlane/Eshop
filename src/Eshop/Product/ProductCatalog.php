<?php

namespace Eshop\Product;

class ProductCatalog
{
    /**
     * @var Product[]
     */
    private $products = [];

    /**
     * @param Product[] $products
     */
    public function addProducts(array $products)
    {
        $this->products += $products;
    }

    /**
     * @param Category $category
     *
     * @return Product[]
     */
    public function browseCategory(Category $category): array
    {
        return array_filter($this->products, function (Product $product) use ($category) {
            return $product->getCategory() == $category;
        });
    }
}
