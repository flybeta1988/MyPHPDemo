<?php
namespace DesignPatterns\BStructural\Proxy;

class HeavyBankAccount implements BankAccount
{
    /**
     * 交易
     * @var int[]
     */
    private array $transactions = [];

    public function deposit(int $amount)
    {
        $this->transactions[] = $amount;
    }

    public function getBalance(): int
    {
        return array_sum($this->transactions);
    }
}