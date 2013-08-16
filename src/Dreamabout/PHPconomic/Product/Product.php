<?php


namespace Dreamabout\PHPConomic\Product;


use Dreamabout\PHPConomic\Object;

class Product extends Object
{
    protected $available = 0;
    protected $barCode;
    protected $costPrice;
    protected $departmentHandle;
    protected $description;
    protected $distributionKeyHandle;
    protected $handle;
    protected $inStock = 0;
    protected $isAccessible = true;
    protected $name;
    protected $number;
    protected $onOrder = 0;
    protected $ordered = 0;
    protected $productGroupHandle = array("Number" => 1);
    protected $recommendedPrice;
    protected $salesPrice;
    protected $unitHandle = array("Number" => 1);
    protected $volume = 1;

    protected $required = array("salesPrice", "costPrice", "recommendedPrice", "volume", "name", "description", "number");

    /**
     * @param mixed $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

    /**
     * @return mixed
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $barCode
     */
    public function setBarCode($barCode)
    {
        $this->barCode = $barCode;
    }

    /**
     * @return mixed
     */
    public function getBarCode()
    {
        return $this->barCode;
    }

    /**
     * @param mixed $costPrice
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
    }

    /**
     * @return mixed
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * @param mixed $departmentHandle
     */
    public function setDepartmentHandle($departmentHandle)
    {
        $this->departmentHandle = $departmentHandle;
    }

    /**
     * @return mixed
     */
    public function getDepartmentHandle()
    {
        return $this->departmentHandle;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $distributionKeyHandle
     */
    public function setDistributionKeyHandle($distributionKeyHandle)
    {
        $this->distributionKeyHandle = $distributionKeyHandle;
    }

    /**
     * @return mixed
     */
    public function getDistributionKeyHandle()
    {
        return $this->distributionKeyHandle;
    }

    /**
     * @param mixed $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * @return mixed
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param mixed $inStock
     */
    public function setInStock($inStock)
    {
        $this->inStock = $inStock;
    }

    /**
     * @return mixed
     */
    public function getInStock()
    {
        return $this->inStock;
    }

    /**
     * @param boolean $isAccessible
     */
    public function setIsAccessible($isAccessible)
    {
        $this->isAccessible = $isAccessible;
    }

    /**
     * @return boolean
     */
    public function getIsAccessible()
    {
        return $this->isAccessible;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        if(strlen($number) > 25) {
            throw new \InvalidArgumentException("Number can't be longer than 25 characters");
        }
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $onOrder
     */
    public function setOnOrder($onOrder)
    {
        $this->onOrder = $onOrder;
    }

    /**
     * @return mixed
     */
    public function getOnOrder()
    {
        return $this->onOrder;
    }

    /**
     * @param mixed $ordered
     */
    public function setOrdered($ordered)
    {
        $this->ordered = $ordered;
    }

    /**
     * @return mixed
     */
    public function getOrdered()
    {
        return $this->ordered;
    }

    /**
     * @param mixed $productGroupHandle
     */
    public function setProductGroupHandle($productGroupHandle)
    {
        $this->productGroupHandle = $productGroupHandle;
    }

    /**
     * @return mixed
     */
    public function getProductGroupHandle()
    {
        return $this->productGroupHandle;
    }

    /**
     * @param mixed $recommendedPrice
     */
    public function setRecommendedPrice($recommendedPrice)
    {
        $this->recommendedPrice = $recommendedPrice;
    }

    /**
     * @return mixed
     */
    public function getRecommendedPrice()
    {
        return $this->recommendedPrice;
    }

    /**
     * @param mixed $salesPrice
     */
    public function setSalesPrice($salesPrice)
    {
        $this->salesPrice = $salesPrice;
    }

    /**
     * @return mixed
     */
    public function getSalesPrice()
    {
        return $this->salesPrice;
    }

    /**
     * @param array $unitHandle
     */
    public function setUnitHandle($unitHandle)
    {
        $this->unitHandle = $unitHandle;
    }

    /**
     * @return array
     */
    public function getUnitHandle()
    {
        return $this->unitHandle;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }


}
