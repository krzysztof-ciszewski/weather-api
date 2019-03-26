<?php

namespace spec\App\Model\Request;

use App\Model\Request\City;
use PhpSpec\ObjectBehavior;

class CitySpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith('test', 1, 1);
    }
    
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(City::class);
    }

    public function is_has_data(): void
    {
        $this->getName()->shouldReturn('test');
        $this->getLat()->shouldReturn(1.0);
        $this->getLon()->shouldReturn(1.0);
    }
}
