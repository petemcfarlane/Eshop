<?php

namespace Eshop\Shop;

use Eshop\Product\Product;

class Basket
{
    /**
     * @var Product[]
     */
    private $products = [];

    /**
     * @param Product $product
     */
    public function add(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * @param Product $product
     *
     * @return bool
     */
    public function contains(Product $product): bool
    {
        return in_array($product, $this->products);
    }
}
