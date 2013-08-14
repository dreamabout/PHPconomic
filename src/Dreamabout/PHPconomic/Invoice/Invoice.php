<?php


namespace Dreamabout\PHPConomic\Invoice;


use Dreamabout\PHPConomic\Object;
use Dreamabout\PHPConomic\Type\DateTime;
use Dreamabout\PHPConomic\Type\TypeInterface;

class Invoice extends Object
{
    protected $currencyHandle;
    protected $date;
    protected $debtorHandle;
    protected $dueDate;
    protected $grossAmount;
    protected $handle;
    protected $heading;
    protected $isVatIncluded = true;
    protected $netAmount;
    protected $netAmountDefaultCurrency;
    protected $orderNumber;
    protected $otherReference;
    protected $propsProtected = array("lines", "delivery", "handle");
    protected $publicEntryNumber;
    protected $remainder = 0.0;
    protected $termOfPaymentHandle;
    protected $textLine1;
    protected $textLine2;
    protected $vatAmount;
    private $debtor;
    private $delivery;
    private $lines = array();

    /**
     * @return mixed
     */
    public function getCurrencyHandle()
    {
        return $this->currencyHandle;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getDebtor()
    {
        return $this->debtor;
    }

    /**
     * @return mixed
     */
    public function getDebtorHandle()
    {
        return $this->debtorHandle;
    }

    /**
     * @return int
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @return mixed
     */
    public function getGrossAmount()
    {
        return $this->grossAmount;
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
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @return boolean
     */
    public function getIsVatIncluded()
    {
        return $this->isVatIncluded;
    }

    /**
     * @return array
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * @return mixed
     */
    public function getNetAmount()
    {
        return $this->netAmount;
    }

    /**
     * @return mixed
     */
    public function getNetAmountDefaultCurrency()
    {
        return $this->netAmountDefaultCurrency;
    }

    /**
     * @return mixed
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @return mixed
     */
    public function getOtherReference()
    {
        return $this->otherReference;
    }

    /**
     * @return mixed
     */
    public function getPublicEntryNumber()
    {
        return $this->publicEntryNumber;
    }

    /**
     * @return float
     */
    public function getRemainder()
    {
        return $this->remainder;
    }

    /**
     * @return mixed
     */
    public function getTermOfPaymentHandle()
    {
        return $this->termOfPaymentHandle;
    }

    /**
     * @return mixed
     */
    public function getTextLine1()
    {
        return $this->textLine1;
    }

    /**
     * @return mixed
     */
    public function getTextLine2()
    {
        return $this->textLine2;
    }

    /**
     * @return mixed
     */
    public function getVatAmount()
    {
        return $this->vatAmount;
    }

    /**
     * @param mixed $currencyHandle
     */
    public function setCurrencyHandle($currencyHandle)
    {
        $this->currencyHandle = $currencyHandle;
    }

    public function setDate($date)
    {
        if (!$date instanceof DateTime) {
            $date = new DateTime($date);
        }
        $this->date = $date;
    }

    public function setDebtor($debtor)
    {
        $this->debtor = $debtor;
    }

    /**
     * @param mixed $debtorHandle
     */
    public function setDebtorHandle($debtorHandle)
    {
        $this->debtorHandle = $debtorHandle;
    }

    /**
     * @param int $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @param mixed $grossAmount
     */
    public function setGrossAmount($grossAmount)
    {
        $this->grossAmount = $grossAmount;
    }

    /**
     * @param mixed $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * @param mixed $heading
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }

    /**
     * @param boolean $isVatIncluded
     */
    public function setIsVatIncluded($isVatIncluded)
    {
        $this->isVatIncluded = $isVatIncluded;
    }

    /**
     * @param array $lines
     */
    public function setLines($lines)
    {
        $this->lines = array_values((array) $lines);
        foreach($this->lines as $key => $line) {
            $line->setNumber($key);
        }
    }

    /**
     * @param mixed $netAmount
     */
    public function setNetAmount($netAmount)
    {
        $this->netAmount = $netAmount;
    }

    /**
     * @param mixed $netAmountDefaultCurrency
     */
    public function setNetAmountDefaultCurrency($netAmountDefaultCurrency)
    {
        $this->netAmountDefaultCurrency = $netAmountDefaultCurrency;
    }

    /**
     * @param mixed $orderNumber
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @param mixed $otherReference
     */
    public function setOtherReference($otherReference)
    {
        $this->otherReference = $otherReference;
    }

    /**
     * @param mixed $publicEntryNumber
     */
    public function setPublicEntryNumber($publicEntryNumber)
    {
        $this->publicEntryNumber = $publicEntryNumber;
    }

    /**
     * @param float $remainder
     */
    public function setRemainder($remainder)
    {
        $this->remainder = $remainder;
    }

    /**
     * @param mixed $termOfPaymentHandle
     */
    public function setTermOfPaymentHandle($termOfPaymentHandle)
    {
        $this->termOfPaymentHandle = $termOfPaymentHandle;
    }

    /**
     * @param mixed $textLine1
     */
    public function setTextLine1($textLine1)
    {
        $this->textLine1 = $textLine1;
    }

    /**
     * @param mixed $textLine2
     */
    public function setTextLine2($textLine2)
    {
        $this->textLine2 = $textLine2;
    }

    /**
     * @param mixed $vatAmount
     */
    public function setVatAmount($vatAmount)
    {
        $this->vatAmount = $vatAmount;
    }

    public function toArray()
    {
        $array = parent::toArray();
        if ($this->debtor && method_exists($this->debtor,"toArray")) {
            $array = array_merge($array, $this->debtor->toArray());

        }
        return $array;
    }


}
