<?php


namespace Dreamabout\PHPconomic;

use Guzzle\Http\Client;
use Guzzle\Http\ClientInterface;

class PHPconomic
{
    const ECONOMIC_WSDL = "https://api.e-conomic.com/secure/api1/EconomicWebService.asmx?WSDL";

    private $client;

    public function __construct(ClientInterface $client = null)
    {
        if (is_null($client)) {
            $client = new Client(self::ECONOMIC_WSDL);
        }

        $this->client = $client;
    }

    public function debtorCreate()
    {
        return new Debtor($this->client);
    }
}
