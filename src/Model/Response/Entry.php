<?php

namespace App\Model\Response;

use App\Model\AbstractEntry;

class Entry extends AbstractEntry
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $cityName;

    public function __construct(
        int $id,
        float $temperature,
        float $cloudiness,
        float $windSpeed,
        string $description,
        int $requestTime,
        string $cityName
    ) {
        parent::__construct($temperature, $cloudiness, $windSpeed, $description, $requestTime);
        $this->id = $id;
        $this->cityName = $cityName;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

}
