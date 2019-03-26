<?php

namespace App\Factory\Response;

use App\Entity\Entry;
use App\Model\Response\EntryPage;

interface EntryPageFactoryInterface
{
    /**
     * @param Entry[] $entries
     * @param int     $total
     * @param int     $pageSize
     *
     * @return EntryPage
     */
    public function create(array $entries, int $total, int $pageSize): EntryPage;
}
