<?php


namespace Dreamabout\PHPConomic\Invoice;


class CurrentInvoice extends Invoice
{
    protected $exchangeRate = 10000;
    protected $isVatIncluded = true;
    protected $margin = 0;
    protected $marginAsPercent = false;
    protected $required = array("date", "exchangeRate", "isVatIncluded", "netAmount", "vatAmount", "grossAmount", "margin", "marginAsPercent", "termOfPaymentHandle");
    protected $vatAmount = 0;

    /**
     * @return int
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * @return boolean
     */
    public function getIsVatIncluded()
    {
        return $this->isVatIncluded;
    }

    /**
     * @return int
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * @return boolean
     */
    public function getMarginAsPercent()
    {
        return $this->marginAsPercent;
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
     * @param boolean $isVatIncluded
     */
    public function setIsVatIncluded($isVatIncluded)
    {
        $this->isVatIncluded = $isVatIncluded;
    }

    /**
     * @param int $margin
     */
    public function setMargin($margin)
    {
        $this->margin = $margin;
    }

    /**
     * @param boolean $marginAsPercent
     */
    public function setMarginAsPercent($marginAsPercent)
    {
        $this->marginAsPercent = $marginAsPercent;
    }

    /**
     * @param int $vatAmount
     */
    public function setVatAmount($vatAmount)
    {
        $this->vatAmount = $vatAmount;
    }

    public function setHandle($handle)
    {
        parent::setHandle($handle);
        /** @var CurrentInvoiceLine $line */
        foreach ($this->getLines() as $line) {
            $line->setInvoiceHandle($handle);
        }
    }
}
