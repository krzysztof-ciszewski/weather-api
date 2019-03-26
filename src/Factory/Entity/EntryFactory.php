<?php

namespace App\Factory\Entity;

use App\Entity\Entry;
use App\Model\Request\NewEntry;

class EntryFactory implements EntryFactoryInterface
{
    public function create(NewEntry $newEntry): Entry
    {
        return (new Entry())
            ->setTemperature($newEntry->getTemperature())
            ->setWindSpeed($newEntry->getWindSpeed())
            ->setCloudiness($newEntry->getCloudiness())
            ->setDescription($newEntry->getDescription())
            ->setRequestTime($newEntry->getRequestTime())
            ->setCityName($newEntry->getCity()->getName())
            ->setCityLat($newEntry->getCity()->getLat())
            ->setCityLon($newEntry->getCity()->getLon());
    }
}
