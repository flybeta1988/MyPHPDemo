<?php
class Collection
{
    private $rows;

    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    protected function toArray() {
        if (!$this->rows) {
            return [];
        }
        $result = [];
        foreach ($this->rows as $obj) {
            $result[] = $obj->toArray();
        }
        return $result;
    }
}