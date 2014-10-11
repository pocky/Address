<?php

namespace spec\Address;

use Address\Street;
use PhpSpec\ObjectBehavior;

class StreetSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Address\Street');
    }

    public function let()
    {
        $this->beConstructedWith(1600, "Amphitheatre Pkwy");
    }

    public function it_should_have_a_number()
    {
        $this->getNumber()->shouldReturn(1600);
        $this->getNumber()->shouldBeInt();
    }

    public function it_should_have_a_street()
    {
        $this->getStreet()->shouldReturn("Amphitheatre Pkwy");
        $this->getStreet()->shouldBeString();
    }

    public function it_should_have_a_value()
    {
        $this->getValue()->shouldReturn("1600 Amphitheatre Pkwy");
        $this->getvalue(',')->shouldReturn("1600, Amphitheatre Pkwy");
    }

    public function it_should_be_equal()
    {
        $street = new Street(1600, "Amphitheatre Pkwy");
        $this->isEqualTo($street)->shouldReturn(true);
    }
}
