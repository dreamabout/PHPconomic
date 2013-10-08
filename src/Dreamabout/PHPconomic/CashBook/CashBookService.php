<?php
namespace Dreamabout\PHPConomic\CashBook;

use Dreamabout\PHPConomic\Exception\PHPConomicException;
use Dreamabout\PHPConomic\Invoice\Invoice;
use Dreamabout\PHPConomic\Service;

class CashBookService extends Service
{
    public function createDebtorPayment(DebtorPayment $debtor)
    {
        $this->client->connect();
        try {
            $response = $this->client->CashBookEntry_CreateDebtorPayment($debtor->toArray());

            return new CashBookEntry((array) $response->CashBookEntry_CreateDebtorPaymentResult);
        } catch (\SoapFault $e) {
            throw new PHPConomicException($e->getMessage());
        }
    }

    public function updateEntryFromInvoice(CashBookEntry $entry, Invoice $invoice)
    {
        $this->client->connect();
        $cashBookData = array("CashBookEntryHandle" => $entry->toArray());

        try {
            $this->client->CashBookEntry_SetValue(array_merge($cashBookData, array("value" => $invoice->getGrossAmount())));
            $number = $invoice->getId();
            if (is_array($number)) {
                $number = current($number);
            }
            $this->client->CashBookEntry_SetDebtorInvoiceNumber(array_merge($cashBookData, array("value" => $number)));
            $this->client->CashBookEntry_SetText(array_merge($cashBookData, array("value" => "Invoice No. {$number}")));

            return $entry;
        } catch (\SoapFault $e) {
            throw new PHPConomicException($e->getMessage());
        }
    }
}
