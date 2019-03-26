<?php

namespace App\Entity;

class AbstractEntity implements EntityInterface
{
    /**
     * @var int
     */
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }
}
