<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\Item as ItemTag;
use Condividendo\FatturaPA\Traits\Makeable;
use Condividendo\FatturaPA\Traits\UsesDecimal;

class Item extends Entity
{
    use Makeable;
    use UsesDecimal;

    /**
     * @var int
     */
    private $lineNumber;

    /**
     * @var string
     */
    private $description;

    /**
     * @var ?\Brick\Math\BigDecimal
     */
    private $quantity = null;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $unitPrice;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $totalPrice;

    /**
     * @var \Brick\Math\BigDecimal
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

    /**
     * @param string|\Brick\Math\BigDecimal $quantity
     * @return $this
     */
    public function setQuantity($quantity): self
    {
        $this->quantity = static::makeDecimal($quantity);

        return $this;
    }

    /**
     * @param string|\Brick\Math\BigDecimal $unitPrice
     * @return $this
     */
    public function setPrice($unitPrice): self
    {
        $this->unitPrice = static::makeDecimal($unitPrice);

        return $this;
    }

    /**
     * @param string|\Brick\Math\BigDecimal $totalPrice
     * @return $this
     */
    public function setTotalAmount($totalPrice): self
    {
        $this->totalPrice = static::makeDecimal($totalPrice);

        return $this;
    }

    /**
     * @param string|\Brick\Math\BigDecimal $rate
     * @return $this
     */
    public function setTaxRate($rate): self
    {
        $this->taxRate = static::makeDecimal($rate);

        return $this;
    }

    public function getTag(): ItemTag
    {
        $tag = ItemTag::make()
            ->setLineNumber($this->lineNumber)
            ->setDescription($this->description)
            ->setTaxRate($this->taxRate)
            ->setUnitPrice($this->unitPrice)
            ->setTotalAmount($this->totalPrice);

        if ($this->quantity) {
            $tag->setQuantity($this->quantity);
        }

        return $tag;
    }
}
