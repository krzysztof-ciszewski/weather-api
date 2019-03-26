<?php

namespace spec\App\Controller;

use App\Controller\GetEntryList;
use App\Model\Response\EntryPage;
use App\Provider\EntryPageProviderInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Response;

class GetEntryListSpec extends ObjectBehavior
{
    public function let(
        EntryPageProviderInterface $provider,
        ViewHandlerInterface $viewHandler
    ): void {
        $this->beConstructedWith($provider);
        $this->setViewHandler($viewHandler);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(GetEntryList::class);
        $this->shouldHaveType(AbstractFOSRestController::class);
    }

    public function it_returns_page_response(
        EntryPageProviderInterface $provider,
        ViewHandlerInterface $viewHandler,
        EntryPage $page
    ): void {
        $page->getItems()->willReturn([]);
        $provider->getPage(1)->willReturn($page);
        $viewHandler->handle(
            Argument::that(
                function (View $view) {
                    return $view->getStatusCode() === Response::HTTP_OK
                        && $view->getData() instanceof EntryPage
                        && $view->getData()->getItems() === [];
                }
            )
        )->willReturn(new Response());
        $this(1);
    }
}
