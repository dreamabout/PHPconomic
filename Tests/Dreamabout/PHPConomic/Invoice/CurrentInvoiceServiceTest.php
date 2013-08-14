<?php


namespace Dreamabout\PHPConomic\Invoice;


class CurrentInvoiceServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var  CurrentInvoiceService */
    private $uot;

    public function setUp()
    {
        $this->uot = new CurrentInvoiceService(uot());
    }

    public function testCreateFromData()
    {
        $invoice = new CurrentInvoice();
        $invoice->setOtherReference(13412);
        $invoice->setNetAmount(1000);
        $invoice->setVatAmount(250);
        $invoice->setDate("2013-07-08");
        $invoice->setGrossAmount(1000);
        $invoice->setMarginAsPercent(0);
        $debtor = new DebtorAddress();
        $debtor->setDebtorAddress("Address 1");
        $debtor->setDebtorName("Mogens Mogensen");
        $invoice->setDebtor($debtor);
        $invoice->setDebtorHandle(array("Number" => 1));
        $invoice->setTermOfPaymentHandle(array("Id" => 1));
        $invoice->setCurrencyHandle(array("Code" => "DKK"));
        try {
            $response = $this->uot->createFromData($invoice);
            assertThat($response, anInstanceOf("Dreamabout\\PHPConomic\\Invoice\\CurrentInvoice"));
            assertThat($invoice->getHandle(), is(not(null)));
        } catch(\SoapFault $e) {
            var_dump($e->getMessage());
            var_dump($this->uot->getClient()->__getLastRequest());
            var_dump($this->uot->getClient()->__getLastRequestHeaders());
        }

    }

}
