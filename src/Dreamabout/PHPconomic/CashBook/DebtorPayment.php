<?php


namespace Dreamabout\PHPConomic\CashBook;


use Dreamabout\PHPConomic\Object;

class DebtorPayment extends Object
{
    protected $cashBookHandle;
    protected $debtorHandle;
    protected $contraAccount = array("Number" => 5820);

    public function setDebtorHandle($debtorHandle)
    {
        $this->debtorHandle = $this->getHandle($debtorHandle);
    }

    public function setCashBookHandle($cashBookHandle)
    {
        $this->cashBookHandle = $this->getHandle($cashBookHandle);
    }

    public function setContraAccountHandle($contraAccountHandle)
    {
        $this->contraAccount = $this->getHandle($contraAccountHandle);
    }
}
