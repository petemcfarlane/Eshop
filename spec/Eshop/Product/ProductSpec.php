<?php

namespace spec\Eshop\Product;

use Eshop\Product\Category;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function let(Category $category)
    {
        $this->beConstructedWith('V-neck', $category);
    }

    function it_has_a_category(Category $category)
    {
        $this->getCategory()->shouldBe($category);
    }
}
