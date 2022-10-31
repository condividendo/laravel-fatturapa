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


    function __construct(){
        $this->vatNumber = VatNumber::make();
        $this->registry = Registry::make();
        $this->taxRegime = TaxRegime::make();
        $this->taxRegime->setTaxRegime(\Condividendo\FatturaPA\Enums\TaxRegime::RF01());
    }


    public function setFirstName(string $name){
        $this->registry->setFirstName($name);
    }

    public function setLastName(string $name){
        $this->registry->setLastName($name);
    }

    public function setTitle(string $name){
        $this->registry->setTitle($name);
    }

    public function setCompanyName(string $name){
        $this->registry->setCompanyName($name);
    }

    public function setVatNumber(string $countryCode,string $vatNumber){
        $this->vatNumber->setCountryId(CountryId::make()->setId($countryCode));
        $this->vatNumber->setCodeId(CodeId::make()->setId($vatNumber));
    }


    public function setFiscalCode(string $fiscalCode): self
    {
        $this->fiscalCode = FiscalCode::make()->setFiscalCode($fiscalCode);
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
