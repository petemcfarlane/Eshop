<?php

namespace Eshop\Shop;

use Eshop\Product\Product;

class Basket
{
    private $items = [];

    public function add(Product $product)
    {
        $this->items[] = $product;
    }

    public function contains(Product $product): bool
    {
        return in_array($product, $this->items);
    }
}
