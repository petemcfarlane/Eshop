<?php

namespace spec\Eshop\Product;

use Eshop\Product\Product;
use Eshop\Product\Category;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductCatalogSpec extends ObjectBehavior
{
    function it_can_add_products(Product $product1, Product $product2)
    {
        $this->addProducts([$product1, $product2]);
    }

    function it_can_browse_a_category()
    {
        $shirts = Category::fromString('shirts');
        $tShirt = new Product('T-shirt', $shirts);

        $this->addProducts([$tShirt]);

        $this->browseCategory($shirts)->shouldContain($tShirt);
    }
}
