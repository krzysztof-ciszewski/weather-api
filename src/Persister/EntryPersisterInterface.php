<?php

namespace App\Persister;

use App\Entity\EntityInterface;
use App\Entity\Entry;

interface EntryPersisterInterface
{
    public function save(Entry $entry): void;
}
