<?php

namespace App\Factory\Response;

use App\Entity\Entry;
use App\Model\Response\EntryPage;

class EntryPageFactory implements EntryPageFactoryInterface
{
    /**
     * @var EntryFactoryInterface
     */
    private $entryFactory;

    public function __construct(EntryFactoryInterface $entryFactory)
    {
        $this->entryFactory = $entryFactory;
    }

    /**
     * @inheritdoc
     */
    public function create(array $entries, int $total): EntryPage
    {
        return new EntryPage(
            array_map(
                function (Entry $entry) {
                    return $this->entryFactory->create($entry);
                },
                $entries
            ), $total
        );
    }
}
