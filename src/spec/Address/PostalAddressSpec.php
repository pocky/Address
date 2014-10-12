<?php

namespace spec\Address;

use Address\Country;
use Address\Street;
use PhpSpec\ObjectBehavior;

class PostalAddressSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Address\PostalAddress');
    }

    public function let()
    {
        $street  = new Street(1600, "Amphitheatre Pkwy");
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

    public function it_should_have_a_street_number()
    {
        $this->getStreetNumber()->shouldReturn(1600);
    }

    public function it_should_have_a_street_name()
    {
        $this->getStreetName()->shouldReturn("Amphitheatre Pkwy");
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
        $this->getPostOfficeBoxNumber()->shouldReturn(23);
    }

    public function it_should_have_a_country()
    {
        $this->getCountry()->shouldReturn("United States, US");
    }

    public function it_should_have_a_country_code()
    {
        $this->getCountryCode()->shouldReturn("US");
    }

    public function it_should_have_a_country_name()
    {
        $this->getCountryName()->shouldReturn("United States");
    }

    public function it_should_have_a_value()
    {
        $this->getValue()->shouldBeArray();
    }
}
