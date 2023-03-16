<?php
namespace DesignPatterns\BStructural\Proxy;

class BankAccountProxy extends HeavyBankAccount implements BankAccount
{
    private ?int $balance = null;

    public function getBalance(): int
    {
        if (null === $this->balance) {
            $this->balance = parent::getBalance();
        }
        return $this->balance;
    }
}