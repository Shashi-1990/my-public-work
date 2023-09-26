<?php
//unit test cases
use PHPUnit\Framework\TestCase;
require_once('WithdrawalMachine.php');

class WithdrawalMachineTest extends TestCase
{
    public function testWithdrawValidAmount()
    {
        $withdrawalMachine = new WithdrawalMachine();
        $result = $withdrawalMachine->withdraw(30.00);
        $this->assertEquals([20.00 => 1, 10.00 => 1], $result);
    }

    public function testWithdrawInvalidAmount()
    {
        $withdrawalMachine = new WithdrawalMachine();
        $this->expectException(NoteUnavailableException::class);
        $withdrawalMachine->withdraw(125.00);
    }

    public function testWithdrawNegativeAmount()
    {
        $withdrawalMachine = new WithdrawalMachine();
        $this->expectException(InvalidArgumentException::class);
        $withdrawalMachine->withdraw(-130.00);
    }

    public function testWithdrawZeroAmount()
    {
        $withdrawalMachine = new WithdrawalMachine();
        $result = $withdrawalMachine->withdraw(0);
        $this->assertEquals([], $result);
    }
}
?>