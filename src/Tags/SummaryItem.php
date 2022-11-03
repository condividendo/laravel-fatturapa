<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class SummaryItem extends AbstractTag
{
    use Makeable;

    /**
     * @var VatTax
     */
    private $vatTax;

    /**
     * @var TaxableAmount
     */
    private $taxableAmount;

    /**
     * @var Duty
     */
    private $duty;

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
        $this->vatTax = VatTax::make()->setRate($rate);
        return $this;
    }


    public function setTaxableAmount(float $amount): self
    {
        $this->taxableAmount = TaxableAmount::make()->setAmount($amount);
        return $this;
    }


    public function setTaxAmount(float $amount): self
    {
        $this->duty = Duty::make()->setDuty($amount);
        return $this;
    }


    public function setNature(\Condividendo\FatturaPA\Enums\Nature $nature): self
    {
        $this->nature = Nature::make()->setNature($nature);
        return $this;
    }


    public function setRegulatoryReference(\Condividendo\FatturaPA\Enums\RegulatoryReference $ref): self
    {
        $this->regulatoryReference = RegulatoryReference::make()->setRegulatoryReference($ref);
        return $this;
    }


    public function setVatCollectionMode(\Condividendo\FatturaPA\Enums\VatCollectionMode $collectionMode): self
    {
        $this->vatCollectionMode = VatCollectionMode::make()->setVatCollectionMode($collectionMode);
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiRiepilogo');

        $e->appendChild($this->vatTax->toDOMElement($dom));
        if ($this->nature) {
            $e->appendChild($this->nature->toDOMElement($dom));
        }
        $e->appendChild($this->taxableAmount->toDOMElement($dom));
        $e->appendChild($this->duty->toDOMElement($dom));
        if ($this->vatCollectionMode) {
            $e->appendChild($this->vatCollectionMode->toDOMElement($dom));
        }
        if ($this->regulatoryReference) {
            $e->appendChild($this->regulatoryReference->toDOMElement($dom));
        }

        return $e;
    }
}
