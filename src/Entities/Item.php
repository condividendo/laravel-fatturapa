<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
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
     * @var float
     */
    private $quantity;

    /**
     * @var float
     */
    private $unitPrice;

    /**
     * @var float
     */
    private $totalPrice;

    /**
     * @var float
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

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    public function setTotalAmount(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    public function setTaxRate(float $rate): self
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
