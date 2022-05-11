<?php
namespace DesignPatterns\BStructural\Proxy;

use PHPUnit\Framework\TestCase;

include_once("../../autoload.php");

class ProxyTest extends TestCase
{
    public function testProxyWillOnlyExecuteExpensiveGetBalanceOnce()
    {
        $bankAccount = new BankAccountProxy();
        $bankAccount->deposit(30);

        $this->assertSame(30, $bankAccount->getBalance());

        $bankAccount->deposit(50);

        $this->assertSame(30, $bankAccount->getBalance());
    }
}