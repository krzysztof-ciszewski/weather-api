<?php

namespace spec\App\Controller;

use App\Controller\CreateEntry;
use App\Entity\Entry;
use App\Factory\Entity\EntryFactoryInterface;
use App\Factory\Response\EntryFactoryInterface as EntryResponseFactoryInterface;
use App\Model\Request\NewEntry;
use App\Model\Response\Entry as EntryResponse;
use App\Persister\EntryPersisterInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class CreateEntrySpec extends ObjectBehavior
{
    public function let(
        EntryFactoryInterface $entryEntityFactory,
        EntryPersisterInterface $persister,
        EntryResponseFactoryInterface $entryResponseFactory,
        ViewHandlerInterface $viewHandler
    ): void {
        $this->beConstructedWith($entryEntityFactory, $persister, $entryResponseFactory);
        $this->setViewHandler($viewHandler);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(CreateEntry::class);
        $this->shouldHaveType(AbstractFOSRestController::class);

    }

    public function it_should_create_new_entry(
        EntryFactoryInterface $entryEntityFactory,
        EntryPersisterInterface $persister,
        EntryResponseFactoryInterface $entryResponseFactory,
        NewEntry $newEntry,
        Entry $entry,
        EntryResponse $entryResponse,
        ConstraintViolationListInterface $violation,
        ViewHandlerInterface $viewHandler
    ): void {
        $violation->count()->willReturn(0);

        $persister->save($entry)->shouldBeCalledOnce();
        $entryEntityFactory->create($newEntry)->willReturn($entry);
        $entryResponseFactory->create($entry)->willReturn($entryResponse);

        $viewHandler->handle(
            Argument::that(
                function (View $view) {
                    return $view->getStatusCode() === Response::HTTP_CREATED
                        && $view->getData() instanceof EntryResponse;
                }
            )
        )->willReturn(new Response());
        $this($newEntry, $violation);
    }
}
