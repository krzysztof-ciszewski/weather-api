<?php

namespace App\Model;

abstract class AbstractEntry
{
    /**
     * @var float
     */
    private $temperature;

    /**
     * @var float
     */
    private $cloudiness;

    /**
     * @var float
     */
    private $windSpeed;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $requestTime;

    public function __construct(
        float $temperature,
        float $cloudiness,
        float $windSpeed,
        string $description,
        int $requestTime
    ) {
        $this->temperature = $temperature;
        $this->cloudiness = $cloudiness;
        $this->windSpeed = $windSpeed;
        $this->description = $description;
        $this->requestTime = $requestTime;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getCloudiness(): float
    {
        return $this->cloudiness;
    }

    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRequestTime(): int
    {
        return $this->requestTime;
    }
}
