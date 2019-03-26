<?php

namespace App\Provider;

use App\Entity\Entry;

interface EntryProviderInterface
{
    /**
     * @param int $page
     * @param int $pageSize
     *
     * @return Entry[]
     */
    public function getPage(int $page, int $pageSize): array;

    public function getTotal(): int;
}
