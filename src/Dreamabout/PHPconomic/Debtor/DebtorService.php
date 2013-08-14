<?php


namespace Dreamabout\PHPConomic\Debtor;


use Dreamabout\PHPConomic;
use Dreamabout\PHPConomic\Exception\Debtor\DebtorNotFoundException;

class DebtorService extends PHPConomic\Service
{
    public function findDebtorByNumber($number)
    {
        $this->client->connect();
        try{
            $response = $this->client->Debtor_FindByNumber(array("number" => $number));
            if(!isset($response->Debtor_FindByNumberResult)) {
                throw new DebtorNotFoundException(sprintf("The Debtor with %s couldn't be found", $number));
            }
            return $response;
        } catch (\SoapFault $e) {
            throw new PHPConomicException($e->getMessage());
        }
    }

    public function getClient()
    {
        return $this->client;
    }
}
