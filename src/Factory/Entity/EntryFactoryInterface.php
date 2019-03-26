<?php

namespace App\Factory\Entity;

use App\Entity\Entry;
use App\Model\Request\NewEntry;

interface EntryFactoryInterface
{
    public function create(NewEntry $newEntry): Entry;
}
