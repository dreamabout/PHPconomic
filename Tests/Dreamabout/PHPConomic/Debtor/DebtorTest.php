<?php


namespace Dreamabout\PHPConomic\Debtor;


use Dreamabout\PHPConomic\Exception\Debtor\DebtorNotFoundException;

class DebtorTest extends \PHPUnit_Framework_TestCase
{
    /** @var Debtor  */
    private $uot;

    public function setUp()
    {
        $this->uot = new Debtor(uot());
    }

    public function testFindByNumber()
    {
        $response = $this->uot->findDebtorByNumber(1);
        assertThat((array) $response, hasKey("Debtor_FindByNumberResult"));
    }

    public function testFindByNumberFail()
    {
        try {
            $response = $this->uot->findDebtorByNumber(-1);
            $this->fail("Found a debtor with -1");
        } catch (DebtorNotFoundException $e) {
            assertThat($e->getMessage(), containsString("with -1"));
        }

    }

}
