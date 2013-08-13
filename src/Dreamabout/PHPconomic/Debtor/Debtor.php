<?php


namespace Dreamabout\PHPConomic\Debtor;


use Dreamabout\PHPConomic;

class Debtor
{
    private $base;

    public function __construct(PHPConomic $base)
    {
        $this->base = $base;
    }

    public function findDebtorByNumber($number)
    {
        $client = $this->base->getClient();
        $client->connect();

    }
}
