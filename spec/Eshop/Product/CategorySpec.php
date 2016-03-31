<?php

namespace spec\Eshop\Product;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedFromString('shirts');
        $this->shouldHaveType('Eshop\Product\Category');
    }

    function it_can_be_converted_to_a_string()
    {
        $this->__toString()->shouldReturn('shirts');
    }
}
