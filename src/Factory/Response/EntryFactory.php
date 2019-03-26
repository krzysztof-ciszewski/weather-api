<?php

namespace App\Factory\Response;

use App\Entity\Entry;
use App\Model\Response\Entry as EntryResponse;

class EntryFactory implements EntryFactoryInterface
{
    public function create(Entry $entry): EntryResponse
    {
        return new EntryResponse(
            $entry->getId(),
            $entry->getTemperature(),
            $entry->getCloudiness(),
            $entry->getWindSpeed(),
            $entry->getDescription(),
            $entry->getRequestTime(),
            $entry->getCityName()
        );
    }
}
