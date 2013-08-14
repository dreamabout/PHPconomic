<?php


namespace Dreamabout\PHPConomic\Invoice;


use Dreamabout\PHPConomic\Service;

class CurrentInvoiceService extends Service
{
    public function createFromData(CurrentInvoice $invoice)
    {
        $this->client->connect();
        try {
            $response = $this->client->CurrentInvoice_CreateFromData(array("data" => $invoice->toArray()));
            if (isset($response->CurrentInvoice_CreateFromDataResult)) {
                $invoice->setHandle($response->CurrentInvoice_CreateFromDataResult->Id);
            }
            return $invoice;
        } catch (\SoapFault $e) {
            throw $e;
        }
    }

    public function getClient()
    {
        return parent::getClient();
    }

}
