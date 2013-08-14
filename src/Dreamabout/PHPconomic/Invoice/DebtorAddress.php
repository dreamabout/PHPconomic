<?php


namespace Dreamabout\PHPConomic\Invoice;

use Dreamabout\PHPConomic\Object;

class DebtorAddress extends Object
{
    protected $debtorAddress;
    protected $debtorCity;
    protected $debtorCountry;
    protected $debtorEan;
    protected $debtorName;
    protected $debtorPostalCode;

    /**
     * @return mixed
     */
    public function getDebtorAddress()
    {
        return $this->debtorAddress;
    }

    /**
     * @return mixed
     */
    public function getDebtorCity()
    {
        return $this->debtorCity;
    }

    /**
     * @return mixed
     */
    public function getDebtorCountry()
    {
        return $this->debtorCountry;
    }

    /**
     * @return mixed
     */
    public function getDebtorEan()
    {
        return $this->debtorEan;
    }

    /**
     * @return mixed
     */
    public function getDebtorName()
    {
        return $this->debtorName;
    }

    /**
     * @return mixed
     */
    public function getDebtorPostalCode()
    {
        return $this->debtorPostalCode;
    }

    /**
     * @param mixed $debtorAddress
     */
    public function setDebtorAddress($debtorAddress)
    {
        $this->debtorAddress = $debtorAddress;
    }

    /**
     * @param mixed $debtorCity
     */
    public function setDebtorCity($debtorCity)
    {
        $this->debtorCity = $debtorCity;
    }

    /**
     * @param mixed $debtorCountry
     */
    public function setDebtorCountry($debtorCountry)
    {
        $this->debtorCountry = $debtorCountry;
    }

    /**
     * @param mixed $debtorEan
     */
    public function setDebtorEan($debtorEan)
    {
        $this->debtorEan = $debtorEan;
    }

    /**
     * @param mixed $debtorName
     */
    public function setDebtorName($debtorName)
    {
        $this->debtorName = $debtorName;
    }

    /**
     * @param mixed $debtorPostalCode
     */
    public function setDebtorPostalCode($debtorPostalCode)
    {
        $this->debtorPostalCode = $debtorPostalCode;
    }
}
