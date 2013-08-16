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

    public function testGetProductGroups()
    {
        assertThat($this->uot->getProductGroups(), is(arrayWithSize(5)));
    }

    public function testDeleteFail()
    {
        try {
            $this->uot->delete("TestProdukt123");
            $this->fail("Should fail");
        } catch (ProductNotFoundException $e) {
            assertThat($e->getMessage(), containsString("product does not exist."));
        }
    }

    /**
     * @depends testDeleteFail
     */
    public function testCreateFromData()
    {
        $product = new Product();
        $product->setDescription("Test produkt 1");
        $product->setSalesPrice(500);
        $product->setCostPrice(250);
        $product->setRecommendedPrice(450);
        $product->setName("Test Produktet");
        $product->setNumber("TestProdukt123");
        try {
            $response = $this->uot->createFromData($product);
            assertThat($response, anInstanceOf("Dreamabout\\PHPConomic\\Product\\Product"));
            assertThat($product->getHandle(), hasKey("Number"));
        } catch (\SoapFault $e) {
            var_dump($e->getMessage());
            var_dump($this->uot->getClient()->__getLastRequest());
            var_dump($this->uot->getClient()->__getLastRequestHeaders());
        }
    }

    /**
     * @depends testCreateFromData
     */
    public function testCreateFromData2()
    {
        $product = new Product();
        $product->setDescription("Test produkt 1");
        $product->setSalesPrice(500);
        $product->setCostPrice(250);
        $product->setRecommendedPrice(450);
        $product->setName("Test Produktet");
        $product->setNumber("TestProdukt123");

        $response = $this->uot->createFromData($product);
        assertThat($response, anInstanceOf("Dreamabout\\PHPConomic\\Product\\Product"));
        assertThat($product->getHandle(), hasKey("Number"));
        assertThat($this->uot->getClient()->__getLastRequest(), containsString("FindByNumber"));
    }

    /**
     * @depends testCreateFromData
     */
    public function testDelete()
    {
        try {
            $response = $this->uot->delete("TestProdukt123");
            assertThat($response, anInstanceOf("\\stdClass"));
        } catch (ProductNotFoundException $e) {
            $this->fail("Should not fail");
        }
    }
}
