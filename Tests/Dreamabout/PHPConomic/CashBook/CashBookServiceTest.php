<?php

use Dreamabout\PHPConomic\CashBook\CashBookService;

class CashBookServiceTest extends PHPUnit_Framework_TestCase
{

    /** @var CashBookService  */
    private $uot;

    public function setUp()
    {
        $this->uot = new CashBookService(uot());
    }
}
