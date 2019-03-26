<?php

namespace App\Provider;

use App\Entity\Entry;
use App\Repository\EntryRepository;

class EntryProvider implements EntryProviderInterface
{
    /**
     * @var EntryRepository
     */
    private $entryRepository;

    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * @inheritdoc
     */
    public function getPage(int $page, int $pageSize): array
    {
       return $this->entryRepository->getPage($page, $pageSize);
    }

    /**
     * @inheritdoc
     */
    public function getTotal(): int
    {
        return $this->entryRepository->getTotal();
    }
}
