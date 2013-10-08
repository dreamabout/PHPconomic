<?php


namespace Dreamabout\PHPConomic\Invoice;


use Dreamabout\PHPConomic\Service;
use Dreamabout\PHPConomic;

class CurrentInvoiceService extends Service
{
    public function book(CurrentInvoice $invoice)
    {
        $this->client->connect();

        try {
            $response = $this->client->CurrentInvoice_Book(array("currentInvoiceHandle" => $invoice->getHandle()));
            if (isset($response->CurrentInvoice_BookResult)) {
                $invoice->setHandle((array) $response->CurrentInvoice_BookResult);

                return $invoice;
            }
        } catch (\SoapFault $e) {
            throw $e;
        }
    }
    public function createFromData(CurrentInvoice $invoice)
    {
        $this->client->connect();
        try {
            $response = $this->client->CurrentInvoice_CreateFromData(array("data" => $invoice->toArray()));
            if (isset($response->CurrentInvoice_CreateFromDataResult)) {
                $invoice->setHandle((array) $response->CurrentInvoice_CreateFromDataResult);

                return $invoice;
            }
            var_dump($response);
        } catch (\SoapFault $e) {
            throw $e;
        }
    }

    public function createLines(CurrentInvoice $invoice)
    {
        foreach ($invoice->getLines() as $line) {
            $this->sendLine($line);
        }
        return $invoice;
    }

    private function sendLine(CurrentInvoiceLine $line)
    {
        $this->client->connect();
        try {
            $response = $this->client->CurrentInvoiceLine_CreateFromData(array("data" => $line->toArray()));
            if (isset($response->CurrentInvoiceLine_CreateFromDataResult)) {
                $line->setHandle((array) $response->CurrentInvoiceLine_CreateFromDataResult);

                return $line;
            }
            var_dump($response);
        } catch (\SoapFault $e) {
            throw $e;
        }
    }
}
