<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TaxableEntity extends AbstractTag
{

    use Makeable;

    /**
     * @var VatNumber
     */
    private $vatNumber;

    /**
     * @var FiscalCode
     */
    private $fiscalCode;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var TaxRegime
     */
    private $taxRegime;


    public function setVatNumber(VatNumber $vatNumber): self
    {
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function setFiscalCode(FiscalCode $fiscalCode): self
    {
        $this->fiscalCode = $fiscalCode;
        return $this;
    }

    public function setRegistry(Registry $registry): self
    {
        $this->registry = $registry;
        return $this;
    }

    public function setTaxRegime(TaxRegime $taxRegime): self
    {
        $this->taxRegime = $taxRegime;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiAnagrafici');

        if($this->vatNumber) $e->appendChild($this->vatNumber->toDOMElement($dom));
        if($this->fiscalCode) $e->appendChild($this->fiscalCode->toDOMElement($dom));
        $e->appendChild($this->registry->toDOMElement($dom));
        $e->appendChild($this->taxRegime->toDOMElement($dom));

        return $e;
    }
}
