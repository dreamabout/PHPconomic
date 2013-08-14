<?php


namespace Dreamabout\PHPConomic\Product;


use Dreamabout\PHPConomic\Exception\ProductNotFoundException;

class ProductServiceTest extends \PHPUnit_Framework_TestCase
{

    /** @var ProductService */
    private $uot;

    public function setUp()
    {
        $this->uot = new ProductService(uot());
    }

    public function testFindByNumber()
    {
        try {
            $this->uot->findByNumber(-1);
            $this->fail("Should have thrown an exception");
        } catch (ProductNotFoundException $e) {
            assertThat($e, anInstanceOf("Dreamabout\\PHPConomic\\Exception\\ProductNotFoundException"));
        }
    }

    public function testCreateFromData()
    {
        $product = new Product();
        $product->setDescription("Test produkt 1");
        $product->setSalesPrice(500);
        $product->setCostPrice(250);
        $product->setRecommendedPrice(450);
        $product->setName("Test Produktet");
        try {
            $response = $this->uot->createFromData($product);
            assertThat($response, anInstanceOf("Dreamabout\\PHPConomic\\Product\\Product"));
            assertThat($product->getHandle(), hasKey("Id"));
        } catch (\SoapFault $e) {
            var_dump($e->getMessage());
            var_dump($this->uot->getClient()->__getLastRequest());
            var_dump($this->uot->getClient()->__getLastRequestHeaders());
        }
    }
}
