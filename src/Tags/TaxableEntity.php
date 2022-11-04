<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TaxableEntity extends AbstractTag
{
    use Makeable;

    /**
     * @var ?VatNumber
     */
    private $vatNumber;

    /**
     * @var ?FiscalCode
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


    public function __construct()
    {
        $this->taxRegime->setTaxRegime(\Condividendo\FatturaPA\Enums\TaxRegime::RF01());
    }


    public function setFirstName(string $name): self
    {
        $this->registry->setFirstName($name);
        return $this;
    }

    public function setLastName(string $name): self
    {
        $this->registry->setLastName($name);
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->registry->setTitle($title);
        return $this;
    }

    public function setCompanyName(string $name): self
    {
        $this->registry->setCompanyName($name);
        return $this;
    }

    public function setVatNumber(string $countryCode, string $vatNumber): self
    {
        $this->vatNumber = VatNumber::make()
        ->setCountryId(CountryId::make()->setId($countryCode))
        ->setCodeId(CodeId::make()->setId($vatNumber));
        return $this;
    }

    public function setVatTag(VatNumber $vatNumber): self
    {
        $this->vatNumber = $vatNumber;
        return $this;
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

    public function setTaxRegime(\Condividendo\FatturaPA\Enums\TaxRegime $taxRegime): self
    {
        $this->taxRegime = TaxRegime::make()->setTaxRegime($taxRegime);
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiAnagrafici');

        if ($this->vatNumber) {
            $e->appendChild($this->vatNumber->toDOMElement($dom));
        }
        if ($this->fiscalCode) {
            $e->appendChild($this->fiscalCode->toDOMElement($dom));
        }
        $e->appendChild($this->registry->toDOMElement($dom));
        $e->appendChild($this->taxRegime->toDOMElement($dom));

        return $e;
    }
}
