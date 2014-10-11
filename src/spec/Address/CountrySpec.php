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

    public function it_should_return_a_name_with_his_code()
    {
        $this::buildFromISOCode('FR')->getName()->shouldReturn('France');
    }

    public function it_should_return_a_name_with_his_name()
    {
        $this::buildFromName('France')->getCode()->shouldReturn('FR');
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
        $this->getValue()->shouldBeString();
        $this->getValue()->shouldReturn("France, FR");

        $this->getValueAsArray()->shouldBeArray();
        $this->getValueAsArray()->shouldReturn(["name" => "France", "code" => "FR"]);
    }

    public function it_should_be_equal()
    {
        $country = new Country("France", "FR");
        $this->isEqualTo($country)->shouldReturn(true);
    }

    public function it_should_throw_an_exception()
    {
        $this
            ->shouldThrow('Address\Exception\InvalidCountryException')
            ->during('buildFromISOCode', ["ZZ"]);

        $this
            ->shouldThrow('Address\Exception\InvalidCountryException')
            ->during('buildFromName', ["ZZzzzzzz"]);
    }
}
