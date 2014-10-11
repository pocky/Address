<?php

namespace spec\Address\Formatter;

use Address\Street;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StreetFormatterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Address\Formatter\StreetFormatter');
        $this->shouldImplement('Address\Formatter\FormatterInterface');
    }

    function let()
    {
        $street= new Street(1600, "Amphitheatre Pkwy");

        $this->beConstructedWith($street);
    }

    function it_should_format()
    {
        $this->format('%n')->shouldReturn("Amphitheatre Pkwy");
        $this->format('%u')->shouldBeString();
    }
}
