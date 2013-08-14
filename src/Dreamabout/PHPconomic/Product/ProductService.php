<?php


namespace Dreamabout\PHPConomic\Product;


use Dreamabout\PHPConomic\Exception\ProductNotFoundException;
use Dreamabout\PHPConomic\Service;

class ProductService extends Service
{
    public function createFromData($product)
    {
        $this->client->connect();
        try {
            $data     = array("data" => $product->toArray());
            $response = $this->client->Product_CreateFromData($data);
            if (isset($response->Product_CreateFromDataResult)) {
                $product->setHandle((array) $response->Product_CreateFromDataResult);

                return $product;
            }
        } catch (\SoapFault $e) {
            throw $e;
        }
    }

    public function findByNumber($number)
    {
        $this->client->connect();
        try {
            $data     = array("Number" => $number);
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
}
