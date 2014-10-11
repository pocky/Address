<?php

namespace spec\Address;

use Address\Country;
use PhpSpec\ObjectBehavior;

class CountrySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Address\Country');
    }

    public function let()
    {
        $this->beConstructedWith("France", "FR");
    }

    public function it_should_have_a_name()
    {
        $this->getName()->shouldReturn("France");
    }

    public function it_should_have_a_code()
    {
        $this->getCode()->shouldReturn("FR");
    }

    public function it_should_have_a_value()
    {
        $this->getValue()->shouldReturn("France, FR");
    }

    public function it_should_be_equal()
    {
        $country = new Country("France", "FR");
        $this->isEqualTo($country)->shouldReturn(true);
    }
}
