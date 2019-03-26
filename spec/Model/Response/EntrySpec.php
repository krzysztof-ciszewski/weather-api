<?php

namespace spec\App\Model\Response;

use App\Model\AbstractEntry;
use App\Model\Response\Entry;
use PhpSpec\ObjectBehavior;

class EntrySpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith(
            1,
            10.5,
            50,
            4.2,
            'description',
            100,
            'city'
        );
    }
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Entry::class);
        $this->shouldBeAnInstanceOf(AbstractEntry::class);
    }

    public function is_has_data(): void
    {
        $this->getTemperature()->shouldReturn(10.5);
        $this->getCloudiness()->shouldReturn(50);
        $this->getWindSpeed()->shouldReturn(4.2);
        $this->getDescription()->shouldReturn('description');
        $this->getRequestTime()->shouldReturn(100);
        $this->getCityName()->shouldReturn('city');
        $this->getId()->shouldReturn(1);
    }
}
