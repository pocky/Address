<?php

namespace spec\Address\Formatter;

use Address\Country;
use Address\PostalAddress;
use Address\Street;
use PhpSpec\ObjectBehavior;

class PostalAddressFormatterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Address\Formatter\PostalAddressFormatter');
        $this->shouldImplement('Address\Formatter\FormatterInterface');
    }

    public function let()
    {
        $street = new Street(1600, "Amphitheatre Pkwy");
        $country = new Country("United States", "US");
        $postalAddress = new PostalAddress(
            $street,
            94043,
            "Mountain View",
            "CA",
            23,
            $country
        );

        $this->beConstructedWith($postalAddress);
    }

    public function it_should_format()
    {
        $this->format('%u %n %P %a')->shouldReturn("1600 Amphitheatre Pkwy 94043 United States");
        $this->format('%S %P %a')->shouldBeString();
    }
}
