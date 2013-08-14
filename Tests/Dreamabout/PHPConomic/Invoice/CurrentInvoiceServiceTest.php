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
        $invoice = $this->createInvoice();
        try {
            $response = $this->uot->createFromData($invoice);
            assertThat($response, anInstanceOf("Dreamabout\\PHPConomic\\Invoice\\CurrentInvoice"));
            assertThat($invoice->getHandle(), hasKey("Id"));
        } catch (\SoapFault $e) {
            var_dump($e->getMessage());
            var_dump($this->uot->getClient()->__getLastRequest());
            var_dump($this->uot->getClient()->__getLastRequestHeaders());
        }
    }

    public function testSendLines()
    {
        $invoice = $this->createInvoice();
        $lines   = array();
        $line    = new CurrentInvoiceLine();
        $line->setQuantity(5);
        $line->setUnitNetPrice(500);
        $line->setTotalNetamount(2500);
        $line->setDescription("Kager");
        $line->setUnitCostPrice(250);
        $line->setTotalMargin(0);
        $line->setMarginAsPercent(0);
        $line->setProductHandle(array("Number" => 1));
        $lines[] = $line;
        $invoice->setLines($lines);
        $invoice->setHandle(array("Id" => 1));
        try {
            $response = $this->uot->createLines($invoice);
            assertThat($response, anInstanceOf("Dreamabout\\PHPConomic\\Invoice\\CurrentInvoice"));
            $lines = $invoice->getLines();
            /** @var CurrentInvoiceLine $line */
            foreach ($lines as $line) {
                assertThat($line->getHandle(), hasKey("Id"));
                assertThat($line->getHandle(), hasKey("Number"));
            }

        } catch (\SoapFault $e) {
            var_dump($e->getMessage());
            var_dump($this->uot->getClient()->__getLastRequest());
            var_dump($this->uot->getClient()->__getLastRequestHeaders());
        }
    }

    private function createInvoice()
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

        return $invoice;
    }

}
