<?php

namespace App\Model\Request;

use App\Model\AbstractEntry;

class NewEntry extends AbstractEntry
{
    /**
     * @var City
     */
    private $city;

    public function __construct(
        float $temperature,
        float $cloudiness,
        float $windSpeed,
        string $description,
        int $requestTime,
        City $city
    ) {
        parent::__construct($temperature, $cloudiness, $windSpeed, $description, $requestTime);
        $this->city = $city;
    }

    public function getCity(): City
    {
        return $this->city;
    }
}
