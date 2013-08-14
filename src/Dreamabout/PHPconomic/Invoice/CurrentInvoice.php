<?php


namespace Dreamabout\PHPConomic\Invoice;


class CurrentInvoice extends Invoice
{
    /**
     * @param int $vatAmount
     */
    public function setVatAmount($vatAmount)
    {
        $this->vatAmount = $vatAmount;
    }

    /**
     * @return int
     */
    public function getVatAmount()
    {
        return $this->vatAmount;
    }

    /**
     * @param int $exchangeRate
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * @return int
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * @param boolean $isVatIncluded
     */
    public function setIsVatIncluded($isVatIncluded)
    {
        $this->isVatIncluded = $isVatIncluded;
    }

    /**
     * @return boolean
     */
    public function getIsVatIncluded()
    {
        return $this->isVatIncluded;
    }

    /**
     * @param int $margin
     */
    public function setMargin($margin)
    {
        $this->margin = $margin;
    }

    /**
     * @return int
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * @param boolean $marginAsPercent
     */
    public function setMarginAsPercent($marginAsPercent)
    {
        $this->marginAsPercent = $marginAsPercent;
    }

    /**
     * @return boolean
     */
    public function getMarginAsPercent()
    {
        return $this->marginAsPercent;
    }
    protected $marginAsPercent = false;
    protected $margin = 0;
    protected $vatAmount = 0;
    protected $isVatIncluded = true;
    protected $exchangeRate = 1;
    protected $required = array("date", "exchangeRate", "isVatIncluded", "netAmount", "vatAmount", "grossAmount", "margin", "marginAsPercent", "termOfPaymentHandle");
}
