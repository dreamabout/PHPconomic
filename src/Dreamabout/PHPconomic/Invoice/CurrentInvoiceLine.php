<?php
namespace Dreamabout\PHPConomic\Invoice;

use Dreamabout\PHPConomic\Object;

class CurrentInvoiceLine extends Object
{
    protected $departmentHandle;
    protected $description;
    protected $discountAsPercent = 0;
    protected $distributionHandle;
    protected $handle;
    protected $id;
    protected $invoiceHandle;
    protected $marginAsPercent;
    protected $number;
    protected $product;
    protected $quantity;
    protected $required = array("number", "discountAsPercent", "unitCostPrice");
    protected $totalMargin;
    protected $totalNetamount;
    protected $unitCostPrice;
    protected $unitHandle;
    protected $unitNetPrice;

    /**
     * @return mixed
     */
    public function getDepartmentHandle()
    {
        return $this->departmentHandle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDiscountAsPercent()
    {
        return $this->discountAsPercent;
    }

    /**
     * @return mixed
     */
    public function getDistributionHandle()
    {
        return $this->distributionHandle;
    }

    /**
     * @return mixed
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getInvoiceHandle()
    {
        return $this->invoiceHandle;
    }

    /**
     * @return mixed
     */
    public function getMarginAsPercent()
    {
        return $this->marginAsPercent;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getTotalMargin()
    {
        return $this->totalMargin;
    }

    /**
     * @return mixed
     */
    public function getTotalNetamount()
    {
        return $this->totalNetamount;
    }

    /**
     * @return mixed
     */
    public function getUnitCostPrice()
    {
        return $this->unitCostPrice;
    }

    /**
     * @return mixed
     */
    public function getUnitHandle()
    {
        return $this->unitHandle;
    }

    /**
     * @return mixed
     */
    public function getUnitNetPrice()
    {
        return $this->unitNetPrice;
    }

    /**
     * @param mixed $departmentHandle
     */
    public function setDepartmentHandle($departmentHandle)
    {
        $this->departmentHandle = $departmentHandle;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $discountAsPercent
     */
    public function setDiscountAsPercent($discountAsPercent)
    {
        $this->discountAsPercent = $discountAsPercent;
    }

    /**
     * @param mixed $distributionHandle
     */
    public function setDistributionHandle($distributionHandle)
    {
        $this->distributionHandle = $distributionHandle;
    }

    /**
     * @param mixed $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $invoiceHandle
     */
    public function setInvoiceHandle($invoiceHandle)
    {
        $this->invoiceHandle = $invoiceHandle;
    }

    /**
     * @param mixed $marginAsPercent
     */
    public function setMarginAsPercent($marginAsPercent)
    {
        $this->marginAsPercent = $marginAsPercent;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param mixed $productHandle
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $totalMargin
     */
    public function setTotalMargin($totalMargin)
    {
        $this->totalMargin = $totalMargin;
    }

    /**
     * @param mixed $totalNetamount
     */
    public function setTotalNetamount($totalNetamount)
    {
        $this->totalNetamount = $totalNetamount;
    }

    /**
     * @param mixed $unitCostPrice
     */
    public function setUnitCostPrice($unitCostPrice)
    {
        $this->unitCostPrice = $unitCostPrice;
    }

    /**
     * @param mixed $unitHandle
     */
    public function setUnitHandle($unitHandle)
    {
        $this->unitHandle = $unitHandle;
    }

    /**
     * @param mixed $unitNetPrice
     */
    public function setUnitNetPrice($unitNetPrice)
    {
        $this->unitNetPrice = $unitNetPrice;
    }

    public function toArray()
    {
        $array = parent::toArray();
        if ($this->getQuantity()) {
            $array = $this->addProduct($array);
        }

        return $array;
    }

    private function addProduct($array)
    {
        if (!$this->getProduct()) {
            throw new \InvalidArgumentException("You need to fill out a product");
        }

        $array["ProductHandle"] = $this->getProduct()->getHandle();

        return $array;
    }
}
