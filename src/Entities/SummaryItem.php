<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\Nature;
use Condividendo\FatturaPA\Enums\RegulatoryReference;
use Condividendo\FatturaPA\Enums\VatCollectionMode;
use Condividendo\FatturaPA\Tags\SummaryItem as SummaryItemTag;
use Condividendo\FatturaPA\Traits\Makeable;
use RuntimeException;

class SummaryItem extends Entity
{
    use Makeable;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $taxRate;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $taxableAmount;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $taxAmount;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\VatCollectionMode
     */
    private $vatCollectionMode;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\Nature
     */
    private $nature;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\RegulatoryReference
     */
    private $regulatoryReference;

    public function setTaxRate(BigDecimal $rate): self
    {
        $this->taxRate = $rate;

        return $this;
    }

    public function setTaxableAmount(BigDecimal $amount): self
    {
        $this->taxableAmount = $amount;

        return $this;
    }

    public function setTaxAmount(BigDecimal $amount): self
    {
        $this->taxAmount = $amount;

        return $this;
    }

    public function setNature(Nature $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function setRegulatoryReference(RegulatoryReference $ref): self
    {
        $this->regulatoryReference = $ref;

        return $this;
    }

    public function setVatCollectionMode(VatCollectionMode $collectionMode): self
    {
        $this->vatCollectionMode = $collectionMode;

        return $this;
    }

    public function getTag(): SummaryItemTag
    {
        $tag = SummaryItemTag::make()
            ->setTaxRate($this->taxRate)
            ->setTaxableAmount($this->taxableAmount)
            ->setTaxAmount($this->taxAmount);

        if ($this->vatCollectionMode) {
            $tag->setVatCollectionMode($this->vatCollectionMode);
        }

        if ($this->nature) {
            if (!$this->regulatoryReference) {
                throw new RuntimeException("Regulatory Reference must be set if Nature is provided");
            }

            $tag->setNature($this->nature);
            $tag->setRegulatoryReference($this->regulatoryReference);
        }

        return $tag;
    }
}
