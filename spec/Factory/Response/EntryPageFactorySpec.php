<?php

namespace spec\App\Factory\Response;

use App\Entity\Entry;
use App\Factory\Response\EntryFactoryInterface;
use App\Factory\Response\EntryPageFactory;
use App\Factory\Response\EntryPageFactoryInterface;
use App\Model\Response\Entry as EntryResponse;
use App\Model\Response\EntryPage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntryPageFactorySpec extends ObjectBehavior
{
    public function let(EntryFactoryInterface $entryFactory): void
    {
        $this->beConstructedWith($entryFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(EntryPageFactory::class);
        $this->shouldImplement(EntryPageFactoryInterface::class);
    }

    public function it_has_data(
        EntryFactoryInterface $entryFactory,
        Entry $entry1,
        Entry $entry2,
        EntryResponse $entryResponse1,
        EntryResponse $entryResponse2
    ): void {
        $items = [$entry1, $entry2];
        $responseItems = [$entryResponse1, $entryResponse2];
        $entryFactory->create($entry1)->willReturn($entryResponse1);
        $entryFactory->create($entry2)->willReturn($entryResponse2);
        $list = $this->create($items, 4);
        $list->getItems()->shouldReturn($responseItems);
        $list->count()->shouldReturn(2);
        $list->getTotal()->shouldReturn(4);
    }
}
