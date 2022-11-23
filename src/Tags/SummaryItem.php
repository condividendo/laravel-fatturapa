<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\Nature as NatureEnum;
use Condividendo\FatturaPA\Enums\RegulatoryReference as RegulatoryReferenceEnum;
use Condividendo\FatturaPA\Enums\VatCollectionMode as VatCollectionModeEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class SummaryItem extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\VatTax
     */
    private $vatTax;

    /**
     * @var \Condividendo\FatturaPA\Tags\TaxableAmount
     */
    private $taxableAmount;

    /**
     * @var \Condividendo\FatturaPA\Tags\Duty
     */
    private $duty;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\VatCollectionMode
     */
    private $vatCollectionMode;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\Nature
     */
    private $nature;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\RegulatoryReference
     */
    private $regulatoryReference;

    public function setTaxRate(BigDecimal $rate): self
    {
        $this->vatTax = VatTax::make()->setRate($rate);

        return $this;
    }

    public function setTaxableAmount(BigDecimal $amount): self
    {
        $this->taxableAmount = TaxableAmount::make()->setAmount($amount);

        return $this;
    }

    public function setTaxAmount(BigDecimal $amount): self
    {
        $this->duty = Duty::make()->setDuty($amount);

        return $this;
    }

    public function setNature(NatureEnum $nature): self
    {
        $this->nature = Nature::make()->setNature($nature);

        return $this;
    }

    public function setRegulatoryReference(RegulatoryReferenceEnum $ref): self
    {
        $this->regulatoryReference = RegulatoryReference::make()->setRegulatoryReference($ref);

        return $this;
    }

    public function setVatCollectionMode(VatCollectionModeEnum $collectionMode): self
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
