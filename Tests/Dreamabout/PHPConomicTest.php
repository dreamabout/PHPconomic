<?php


namespace Dreamabout;

use Dreamabout\PHPConomic\Configuration;
use Dreamabout\PHPConomic\Exception\AuthenticationException;

class PHPConomicTest extends \PHPUnit_Framework_TestCase
{
    /** @var PHPConomic */
    private $uot;

    public function setUp()
    {
        $this->uot = uot();
    }

    public function testConnect()
    {
        $response = $this->uot->connect();
        assertThat($response, anInstanceOf("Dreamabout\\PHPConomic"));
    }

    public function testConnectFail()
    {
        $this->uot->getConfiguration()->token = "b12312312312312";
        try {
            $response = $this->uot->connect();
            $this->fail("Did not die from incorrect token");
        } catch (AuthenticationException $e) {
            assertThat($e, is(not(null)));
        }

    }
}
