<?php

namespace App\Factory\Response;

use App\Entity\Entry;
use App\Model\Response\Entry as EntryResponse;

interface EntryFactoryInterface
{
    public function create(Entry $entry): EntryResponse;
}
