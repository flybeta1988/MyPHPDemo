<?php
namespace DesignPatterns\ACreational\Pool;

/**
 * Class WorkerPool 对象池
 * @package DesignPatterns\ACreational\Pool
 */
class WorkerPool implements \Countable
{
    private array $usedWorkers = [];

    private array $freeWorkers = [];

    public function get(): StringReverseWorker
    {
        if (0 == count($this->freeWorkers)) {
            $worker = new StringReverseWorker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->usedWorkers[spl_object_hash($worker)] = $worker;

        return $worker;
    }

    public function dispose(StringReverseWorker $worker)
    {
        $key = spl_object_hash($worker);
        if (isset($this->usedWorkers[$key])) {
            unset($this->usedWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    public function count(): int
    {
        return count($this->usedWorkers) + count($this->freeWorkers);
    }
}