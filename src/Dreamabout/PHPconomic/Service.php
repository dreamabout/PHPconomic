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

    public function getClient()
    {
        return $this->client;
    }
}
