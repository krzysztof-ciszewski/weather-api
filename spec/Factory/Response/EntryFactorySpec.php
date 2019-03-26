<?php

namespace spec\App\Factory\Response;

use App\Entity\Entry;
use App\Factory\Response\EntryFactoryInterface;
use App\Factory\Response\EntryFactory;
use App\Model\Response\Entry as EntryResponse;
use PhpSpec\ObjectBehavior;

class EntryFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(EntryFactory::class);
        $this->shouldImplement(EntryFactoryInterface::class);
    }

    public function it_creates_entry(Entry $entryEntity): void
    {
        $entryEntity->getId()->willReturn(1);
        $entryEntity->getTemperature()->willReturn(10.0);
        $entryEntity->getCloudiness()->willReturn(51.0);
        $entryEntity->getWindSpeed()->willReturn(4.2);
        $entryEntity->getDescription()->willReturn('desc');
        $entryEntity->getRequestTime()->willReturn(100);
        $entryEntity->getCityName()->willReturn('city');
        $entry = $this->create($entryEntity);
        $entry->shouldHaveType(EntryResponse::class);
        $entry->getId()->shouldReturn(1);
        $entry->getTemperature()->shouldReturn(10.0);
        $entry->getCloudiness()->shouldReturn(51.0);
        $entry->getWindSpeed()->shouldReturn(4.2);
        $entry->getDescription()->shouldReturn('desc');
        $entry->getRequestTime()->shouldReturn(100);
        $entry->getCityName()->shouldReturn('city');
    }
}
