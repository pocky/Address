<?php

namespace spec\Address\Formatter;

use Address\Country;
use PhpSpec\ObjectBehavior;

class CountryFormatterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Address\Formatter\CountryFormatter');
        $this->shouldImplement('Address\Formatter\FormatterInterface');
    }

    public function let()
    {
        $country = new Country("United States", "US");

        $this->beConstructedWith($country);
    }

    public function it_should_format()
    {
        $this->format('%a')->shouldReturn("United States");
        $this->format('%a')->shouldBeString();
    }
}
