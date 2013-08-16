<?php


namespace Dreamabout\PHPConomic\Product;


use Dreamabout\PHPConomic\Exception\ProductNotFoundException;
use Dreamabout\PHPConomic\Service;

class ProductService extends Service
{
    public function createFromData(Product $product)
    {
        $this->client->connect();
        try {
            $data     = array("data" => $product->toArray());
            try {
                $product2 = $this->findByNumber($product->getNumber());
                $product->setHandle($product2->getHandle());

                return $product;
            } catch (ProductNotFoundException $e) {
                $response = $this->client->Product_CreateFromData($data);
                if (isset($response->Product_CreateFromDataResult)) {
                    $product->setHandle((array) $response->Product_CreateFromDataResult);
                    return $product;
                }
            }
        } catch (\SoapFault $e) {
            throw $e;
        }
    }

    public function findByNumber($number)
    {
        $this->client->connect();
        try {
            $data     = array("number" => $number);
            $response = $this->client->Product_FindByNumber($data);
            if (isset($response->Product_FindByNumberResult)) {
                $product = new Product();
                $product->setHandle((array) $response->Product_FindByNumberResult);

                return $product;
            }
            throw new ProductNotFoundException();
        } catch (\SoapFault $e) {
            throw $e;
        }
    }

    public function delete($number)
    {
        $this->client->connect();
        try {
            $data     = array("productHandle" => array("Number" => $number));


            return $this->client->Product_Delete($data);
        } catch (\SoapFault $e) {
            throw new ProductNotFoundException($e->getMessage());
        }
    }

    public function getProductGroups()
    {
        $this->client->connect();

        $response = $this->client->ProductGroup_GetAll();
        return $response->ProductGroup_GetAllResult->ProductGroupHandle;

    }
}
