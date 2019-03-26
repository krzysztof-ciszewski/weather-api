<?php

namespace App\Provider;

use App\Factory\Response\EntryPageFactoryInterface;
use App\Model\Response\EntryPage;

class EntryPageProvider implements EntryPageProviderInterface
{
    /**
     * @var int
     */
    private $pageSize;

    /**
     * @var EntryProviderInterface
     */
    private $entryProvider;

    /**
     * @var EntryPageFactoryInterface
     */
    private $entryPageFactory;

    public function __construct(
        EntryProviderInterface $entryProvider,
        EntryPageFactoryInterface $entryPageFactory,
        int $pageSize = 10
    ) {
        $this->pageSize = $pageSize;
        $this->entryProvider = $entryProvider;
        $this->entryPageFactory = $entryPageFactory;
    }

    public function getPage(int $page): EntryPage
    {
        return $this->entryPageFactory->create(
            $this->entryProvider->getPage($page, $this->pageSize),
            $this->entryProvider->getTotal()
        );
    }
}
