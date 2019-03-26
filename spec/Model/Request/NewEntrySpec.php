<?php

namespace spec\App\Model\Request;

use App\Model\AbstractEntry;
use App\Model\Request\City;
use App\Model\Request\NewEntry;
use PhpSpec\ObjectBehavior;

class NewEntrySpec extends ObjectBehavior
{
    /**
     * @var City
     */
    private $city;

    public function let(): void
    {
        $this->city = new City('name', 1, 1);
        $this->beConstructedWith(
            10.5,
            50,
            4.2,
            'description',
            100,
            $this->city
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(NewEntry::class);
        $this->shouldBeAnInstanceOf(AbstractEntry::class);
    }

    public function is_has_data(): void
    {
        $this->getTemperature()->shouldReturn(10.5);
        $this->getCloudiness()->shouldReturn(50);
        $this->getWindSpeed()->shouldReturn(4.2);
        $this->getDescription()->shouldReturn('description');
        $this->getCity()->shouldReturn($this->city);
        $this->getRequestTime()->shouldReturn(100);
    }
}
