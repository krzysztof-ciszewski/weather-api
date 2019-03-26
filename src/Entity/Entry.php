<?php

namespace App\Entity;

class Entry extends AbstractEntity
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

    /**
     * @var string
     */
    private $cityName;

    /**
     * @var float
     */
    private $cityLat;

    /**
     * @var float
     */
    private $cityLon;

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @param float $temperature
     *
     * @return Entry
     */
    public function setTemperature(float $temperature): Entry
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * @return float
     */
    public function getCloudiness(): float
    {
        return $this->cloudiness;
    }

    /**
     * @param int $cloudiness
     *
     * @return Entry
     */
    public function setCloudiness(int $cloudiness): Entry
    {
        $this->cloudiness = $cloudiness;

        return $this;
    }

    /**
     * @return float
     */
    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    /**
     * @param float $windSpeed
     *
     * @return Entry
     */
    public function setWindSpeed(float $windSpeed): Entry
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Entry
     */
    public function setDescription(string $description): Entry
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequestTime(): int
    {
        return $this->requestTime;
    }

    /**
     * @param int $requestTime
     *
     * @return Entry
     */
    public function setRequestTime(int $requestTime): Entry
    {
        $this->requestTime = $requestTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @param string $cityName
     *
     * @return Entry
     */
    public function setCityName(string $cityName): Entry
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return float
     */
    public function getCityLat(): float
    {
        return $this->cityLat;
    }

    /**
     * @param float $cityLat
     *
     * @return Entry
     */
    public function setCityLat(float $cityLat): Entry
    {
        $this->cityLat = $cityLat;

        return $this;
    }

    /**
     * @return float
     */
    public function getCityLon(): float
    {
        return $this->cityLon;
    }

    /**
     * @param float $cityLon
     *
     * @return Entry
     */
    public function setCityLon(float $cityLon): Entry
    {
        $this->cityLon = $cityLon;

        return $this;
    }
}
