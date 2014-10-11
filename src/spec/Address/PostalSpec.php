<?php

namespace spec\Address;

use Address\Country;
use Address\Street;
use PhpSpec\ObjectBehavior;

class AddressSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Address\Postal');
    }

    public function let()
    {
        $street = new Street(1600, "Amphitheatre Pkwy");
        $country = new Country("United States", "US");

        $this->beConstructedWith(
            $street,
            94043,
            "Mountain View",
            "CA",
            23,
            $country
        );
    }

    public function it_should_have_a_street()
    {
        $this->getStreet()->shouldReturn("1600 Amphitheatre Pkwy");
    }

    public function it_should_have_a_postal_code()
    {
        $this->getPostalCode()->shouldReturn(94043);
    }

    public function it_should_have_a_locality()
    {
        $this->getLocality()->shouldReturn("Mountain View");
    }

    public function it_should_have_a_region()
    {
        $this->getRegion()->shouldReturn("CA");
    }

    public function it_should_have_post_office_box_number()
    {
        return $this->getPostOfficeBoxNumber()->shouldReturn(23);
    }

    public function it_should_have_a_country()
    {
        return $this->getCountry()->shouldReturn("United States, US");
    }

    function it_should_have_a_value()
    {
        return $this->getValue()->shouldBeArray();
    }
}
