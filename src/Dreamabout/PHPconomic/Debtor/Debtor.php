<?php


namespace Dreamabout\PHPconomic\Debtor;


use Guzzle\Http\ClientInterface;

class Debtor
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function create()
    {
        return new DebtorCreate();
    }
}
