<?php

namespace App\Controller;

use App\Provider\EntryPageProviderInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

class GetEntryList extends AbstractFOSRestController
{
    /**
     * @var EntryPageProviderInterface
     */
    private $entryPageProvider;

    public function __construct(EntryPageProviderInterface $entryPageProvider)
    {
        $this->entryPageProvider = $entryPageProvider;
    }

    public function __invoke(int $page): Response
    {
        return $this->handleView($this->view($this->entryPageProvider->getPage($page), Response::HTTP_OK));
    }
}
