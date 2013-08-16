<?php


namespace Dreamabout\PHPConomic\Invoice;


class CurrentInvoiceServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var  CurrentInvoiceService */
    private $uot;
    static $invoiceId = null;

    /**
     * @return array
     */
    private function buildInvoiceLines()
    {
        $lines = array();
        $line  = new CurrentInvoiceLine();
        $line->setQuantity(5);
        $line->setUnitNetPrice(500);
        $line->setTotalNetamount(2500);
        $line->setDescription("Kager");
        $line->setUnitCostPrice(250);
        $line->setTotalMargin(0);
        $line->setMarginAsPercent(0);
        $line->setProduct(array("Number" => "TestProdukt1234"));
        $lines[] = $line;

        return array($lines, $line);
    }

    public function setUp()
    {
        if (self::$invoiceId === null) {
            $time            = time();
            self::$invoiceId = $time;
        }
        $this->uot = new CurrentInvoiceService(uot());
    }

    public function testCreateFromData()
    {
        $invoice = $this->createInvoice();
        try {
            $response = $this->uot->createFromData($invoice);
            assertThat($response, anInstanceOf("Dreamabout\\PHPConomic\\Invoice\\CurrentInvoice"));
            assertThat($invoice->getHandle(), hasKey("Id"));
            $handle = $invoice->getHandle();
            self::$invoiceId = $handle["Id"];
        } catch (\SoapFault $e) {
            var_dump($e->getMessage());
            var_dump($this->uot->getClient()->__getLastRequest());
            var_dump($this->uot->getClient()->__getLastRequestHeaders());
        }
    }

    /**
     * This test requires a product with the number TestProdukt1234 to exist. (It isn't deleted or anything).
     *
     * @depends testCreateFromData
     */
    public function testSendLines()
    {
        $invoice = $this->createInvoice();
        list($lines, $line) = $this->buildInvoiceLines();
        $invoice->setLines($lines);
        $invoice = $this->addHandle($invoice);
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
            $this->fail("Got an exception!");
        }
    }

    /**
     * @depends testSendLines
     */
    public function testBook()
    {
        $invoice = $this->createInvoice();

        $bookedInvoice = $this->uot->book($invoice);
        assertThat($bookedInvoice->getHandle(), hasKey("Number"));
    }

    public function testBookWithNumber()
    {

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

        return $this->addHandle($invoice);
    }

    private function addHandle(CurrentInvoice $invoice)
    {
        $invoice->setHandle(array("Id" => self::$invoiceId));
        $invoice->setId(self::$invoiceId);

        return $invoice;

    }

}
