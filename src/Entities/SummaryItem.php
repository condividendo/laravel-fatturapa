<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\SummaryItem as SummaryItemTag;
use Condividendo\FatturaPA\Traits\Makeable;

class SummaryItem extends AbstractEntity
{
    use Makeable;

    /**
     * @var float
     */
    private $taxRate;

    /**
     * @var float
     */
    private $taxableAmount;

    /**
     * @var float
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


    public function setTaxRate(float $rate): self
    {
        $this->taxRate = $rate;
        return $this;
    }


    public function setTaxableAmount(float $amount): self
    {
        $this->taxableAmount = $amount;
        return $this;
    }


    public function setTaxAmount(float $amount): self
    {
        $this->taxAmount = $amount;
        return $this;
    }


    public function setNature(\Condividendo\FatturaPA\Enums\Nature $nature): self
    {
        $this->nature = $nature;
        return $this;
    }


    public function setRegulatoryReference(\Condividendo\FatturaPA\Enums\RegulatoryReference $ref): self
    {
        $this->regulatoryReference = $ref;
        return $this;
    }


    public function setVatCollectionMode(\Condividendo\FatturaPA\Enums\VatCollectionMode $collectionMode): self
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
                ->setTaxAmount($this->taxAmount)
                ->setVatCollectionMode($this->vatCollectionMode ?: \Condividendo\FatturaPA\Enums\VatCollectionMode::I());
        if ($this->nature) {
            assert(!empty($this->regulatoryReference), "Regulatory Reference must be set if Nature is provided");
            $tag->setNature($this->nature);
            $tag->setRegulatoryReference($this->regulatoryReference);
        }
        return $tag;
    }
}
