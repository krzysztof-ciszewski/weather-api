<?php

namespace spec\App\Provider;

use App\Model\Response\Entry;
use App\Factory\Response\EntryPageFactoryInterface;
use App\Model\Response\EntryPage;
use App\Provider\EntryPageProvider;
use App\Provider\EntryPageProviderInterface;
use App\Provider\EntryProviderInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntryPageProviderSpec extends ObjectBehavior
{
    public function let(EntryProviderInterface $provider, EntryPageFactoryInterface $entryListFactory): void
    {
        $this->beConstructedWith($provider, $entryListFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(EntryPageProvider::class);
        $this->shouldImplement(EntryPageProviderInterface::class);
    }

    public function it_creates_page(
        EntryProviderInterface $provider,
        EntryPageFactoryInterface $entryListFactory,
        Entry $entry1,
        Entry $entry2
    ): void {
        $entries = [$entry1->getWrappedObject(), $entry2->getWrappedObject()];
        $list = new EntryPage($entries, 4);

        $provider->getPage(1, 10)->willReturn($entries);
        $provider->getTotal()->willReturn(4);

        $entryListFactory->create($entries, 4)->willReturn($list);

        $resultList = $this->getPage(1);
        $resultList->getItems()->shouldReturn($list->getItems());
        $resultList->getTotal()->shouldReturn(4);
    }
}
