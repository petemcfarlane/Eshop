<?php

namespace spec\Eshop\Shop;

use Eshop\Product\Product;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasketSpec extends ObjectBehavior
{
    function it_can_add_a_product(Product $product)
    {
        $this->add($product);
    }

    function it_can_say_weather_it_contains_a_product_or_not(Product $product)
    {
        $this->contains($product)->shouldBe(false);
        $this->add($product);
        $this->contains($product)->shouldBe(true);
    }
}
