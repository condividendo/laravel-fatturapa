<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\Nature;
use Condividendo\FatturaPA\Enums\RegulatoryReference;
use Condividendo\FatturaPA\Enums\VatCollectionMode;
use Condividendo\FatturaPA\Tags\SummaryItem as SummaryItemTag;
use Condividendo\FatturaPA\Traits\Makeable;

class SummaryItem extends AbstractEntity
{
    use Makeable;

    /**
     * @var BigDecimal
     */
    private $taxRate;

    /**
     * @var BigDecimal
     */
    private $taxableAmount;

    /**
     * @var BigDecimal
     */
    private $taxAmount;

    /**
     * @var ?VatCollectionMode
     */
    private $vatCollectionMode;

    /**
     * @var ?Nature
     */
    private $nature;

    /**
     * @var ?RegulatoryReference
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

    /**
     * @return SummaryItemTag
     */
    public function getTag()
    {
        $tag = SummaryItemTag::make()
                ->setTaxRate($this->taxRate)
                ->setTaxableAmount($this->taxableAmount)
                ->setTaxAmount($this->taxAmount);
        if ($this->vatCollectionMode) {
            $tag->setVatCollectionMode($this->vatCollectionMode);
        }
        if ($this->nature) {
            assert(!empty($this->regulatoryReference), "Regulatory Reference must be set if Nature is provided");
            $tag->setNature($this->nature);
            $tag->setRegulatoryReference($this->regulatoryReference);
        }
        return $tag;
    }
}
