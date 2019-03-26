<?php

namespace spec\App\Factory\Entity;

use App\Entity\Entry;
use App\Factory\Entity\EntryFactory;
use App\Factory\Entity\EntryFactoryInterface;
use App\Model\Request\City;
use App\Model\Request\NewEntry;
use PhpSpec\ObjectBehavior;

class EntryFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(EntryFactory::class);
        $this->shouldImplement(EntryFactoryInterface::class);
    }

    public function it_should_create_entity(): void
    {
        $newEntry = new NewEntry(
            10,
            50,
            5.2,
            'desc',
            100,
            new City('city', 1, 1)
        );
        $entity = $this->create($newEntry);
        $entity->shouldHaveType(Entry::class);
        $entity->getTemperature()->shouldReturn(10.0);
        $entity->getCloudiness()->shouldReturn(50.0);
        $entity->getWindSpeed()->shouldReturn(5.2);
        $entity->getDescription()->shouldReturn('desc');
        $entity->getRequestTime()->shouldReturn(100);
        $entity->getCityName()->shouldReturn('city');
        $entity->getCityLat()->shouldReturn(1.0);
        $entity->getCityLon()->shouldReturn(1.0);

    }
}
