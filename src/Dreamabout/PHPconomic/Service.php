<?php


namespace Dreamabout\PHPConomic;


use Dreamabout\PHPConomic;

class Service
{
    protected $client;

    public function __construct(PHPConomic $base)
    {
        $this->client = $base;
    }

    protected function getClient()
    {
        return $this->client;
    }
}
