<?php

namespace spec\Address\Formatter;

use Address\Country;
use Address\Postal;
use Address\Street;
use PhpSpec\ObjectBehavior;

class PostalFormatterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Address\Formatter\PostalFormatter');
        $this->shouldImplement('Address\Formatter\FormatterInterface');
    }

    public function let()
    {
        $street = new Street(1600, "Amphitheatre Pkwy");
        $country = new Country("United States", "US");
        $postal = new Postal(
            $street,
            94043,
            "Mountain View",
            "CA",
            23,
            $country
        );

        $this->beConstructedWith($postal);
    }

    public function it_should_format()
    {
        $this->format('%u %n %P %a')->shouldReturn("1600 Amphitheatre Pkwy 94043 United States");
        $this->format('%S %P %a')->shouldBeString();
    }
}
