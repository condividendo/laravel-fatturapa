<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Supplier as SupplierTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Supplier extends AbstractEntity
{
    use Makeable;

    /**
     * @var string
     */
    private $companyName;
    
    /**
     * @var ?string
     */
    private $fiscalCode;

    /**
     * @var string
     */
    private $vatCountryId;

    /**
     * @var string
     */
    private $vatNumber;

    /**
     * @var ?\Condividendo\FatturaPA\Entities\TaxRegime
     */
    private $taxRegime;


    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function setVatNumber(string $countryId, string $vatNumber): self
    {
        $this->vatCountryId = $vatCountryId;
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function setFiscalCode(string $fiscalCode): self
    {
        $this->fiscalCode = $fiscalCode;
        return $this;
    }

    public function setTaxRegime(\Condividendo\FatturaPA\Entities\TaxRegime $taxRegime): self
    {
        $this->taxRegime = $taxRegime;
        return $this;
    }

    /**
     * @return SupplierTag
     */
    public function getTag()
    {
        $tag = SupplierTag::make()
                ->setVatNumber($this->vatCountryId, $this->vatNumber)
                ->setTaxRegime($this->taxRegime ?: \Condividendo\FatturaPA\Entities\TaxRegime::RF01())
                ->setCompanyName($this->companyName);
        if($this->fiscalCode){
            $tag->setFiscalCode($this->fiscalCode);
        }
        return $tag;
    }
    
}
