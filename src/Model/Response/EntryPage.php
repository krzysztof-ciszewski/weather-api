<?php

namespace App\Model\Response;

class EntryPage implements \Countable
{
    /**
     * @var int
     */
    protected $pageSize;

    /**
     * @var Entry[]
     */
    private $items;

    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $total;

    public function __construct(array $items, int $total, int $pageSize)
    {
        array_map(
            function (Entry $entry) {
                $this->addItem($entry);
            },
            $items
        );
        $this->size = count($items);
        $this->total = $total;
        $this->pageSize = $pageSize;
    }

    /**
     * @inheritdoc
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return Entry[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param Entry $entry
     */
    private function addItem(Entry $entry): void
    {
        $this->items[] = $entry;
    }
}
