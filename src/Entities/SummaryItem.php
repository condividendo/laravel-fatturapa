<?php

namespace Condividendo\FatturaPA\Entities;

use \Condividendo\FatturaPA\Enums\VatCollectionMode;
use \Condividendo\FatturaPA\Enums\Nature;
use \Condividendo\FatturaPA\Enums\RegulatoryReference;
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
                ->setTaxAmount($this->taxAmount)
                ->setVatCollectionMode($this->vatCollectionMode ?: VatCollectionMode::I());
        if ($this->nature) {
            assert(!empty($this->regulatoryReference), "Regulatory Reference must be set if Nature is provided");
            $tag->setNature($this->nature);
            $tag->setRegulatoryReference($this->regulatoryReference);
        }
        return $tag;
    }
}
