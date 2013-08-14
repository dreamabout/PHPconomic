<?php


namespace Dreamabout\PHPConomic\Invoice;


class InvoiceTest extends \PHPUnit_Framework_TestCase {


    public function testToArray()
    {
        $invoice = new Invoice();
        $array = $invoice->toArray();
        assertThat($array, not(hasKey("debtor")));
        assertThat($array, hasKey("DebtorHandle"));
    }

    public function testToArray1()
    {
        $invoice = new Invoice();
        $debtor = new DebtorAddress();
        $debtor->setDebtorName("Mogens Mogensen");
        $invoice->setDebtor($debtor);

        assertThat($invoice->toArray(), hasKey("DebtorName"));
    }
}
