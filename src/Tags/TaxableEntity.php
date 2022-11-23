<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\TaxRegime as TaxRegimeEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TaxableEntity extends Tag
{
    use Makeable;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\VatNumber
     */
    private $vatNumber;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\FiscalCode
     */
    private $fiscalCode;

    /**
     * @var \Condividendo\FatturaPA\Tags\Registry
     */
    private $registry;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\TaxRegime
     */
    private $taxRegime;

    public function __construct()
    {
        $this->registry = Registry::make();
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

    public function setTaxRegime(TaxRegimeEnum $taxRegime): self
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

        if ($this->taxRegime) {
            $e->appendChild($this->taxRegime->toDOMElement($dom));
        }

        return $e;
    }
}
