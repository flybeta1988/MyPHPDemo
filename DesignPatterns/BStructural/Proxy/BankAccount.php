<?php
namespace DesignPatterns\BStructural\Proxy;

interface BankAccount
{
    //存款
    public function deposit(int $amount);

    //获取余额
    public function getBalance(): int;
}