<?php

namespace spec\App\Provider;

use App\Provider\EntryProvider;
use App\Provider\EntryProviderInterface;
use App\Repository\EntryRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntryProviderSpec extends ObjectBehavior
{
    public function let(EntryRepository $repository): void
    {
        $this->beConstructedWith($repository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(EntryProvider::class);
        $this->shouldImplement(EntryProviderInterface::class);
    }

    public function it_provides_entry_array(EntryRepository $repository): void
    {
        $repository->getPage(1, 50)->willReturn([]);
        $this->getPage(1, 50)->shouldReturn([]);
    }

    public function it_provider_total_count(EntryRepository $repository): void
    {
        $repository->getTotal()->willReturn(4);
        $this->getTotal()->shouldReturn(4);
    }
}
