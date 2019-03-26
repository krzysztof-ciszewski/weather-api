<?php

namespace App\Model\Request;

class City
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $lat;

    /**
     * @var float
     */
    private $lon;

    public function __construct(string $name, float $lat, float $lon)
    {
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }
}
