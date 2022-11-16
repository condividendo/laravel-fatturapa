<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Tags\Item as ItemTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Item extends AbstractEntity
{
    use Makeable;

    /**
     * @var int
     */
    private $lineNumber;

    /**
     * @var string
     */
    private $description;

    /**
     * @var BigDecimal
     */
    private $quantity;

    /**
     * @var BigDecimal
     */
    private $unitPrice;

    /**
     * @var BigDecimal
     */
    private $totalPrice;

    /**
     * @var BigDecimal
     */
    private $taxRate;


    public function setNumber(int $lineNumber): self
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setQuantity(BigDecimal $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setPrice(BigDecimal $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    public function setTotalAmount(BigDecimal $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    public function setTaxRate(BigDecimal $rate): self
    {
        $this->taxRate = $rate;
        return $this;
    }

    /**
     * @return ItemTag
     */
    public function getTag()
    {
        return ItemTag::make()
            ->setLineNumber($this->lineNumber)
            ->setQuantity($this->quantity)
            ->setDescription($this->description)
            ->setTaxRate($this->taxRate)
            ->setUnitPrice($this->unitPrice)
            ->setTotalAmount($this->totalPrice);
    }
}
