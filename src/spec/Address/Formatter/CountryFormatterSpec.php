<?php

namespace spec\Address\Formatter;

use Address\Country;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CountryFormatterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Address\Formatter\CountryFormatter');
        $this->shouldImplement('Address\Formatter\FormatterInterface');
    }

    function let()
    {
        $country = new Country("United States", "US");

        $this->beConstructedWith($country);
    }

    function it_should_format()
    {
        $this->format('%a')->shouldReturn("United States");
        $this->format('%a')->shouldBeString();
    }
}
