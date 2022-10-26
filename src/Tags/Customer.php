<?php
namespace Condividendo\FatturaPA\Tags;

class Customer
{
    
    // TODO: RappresentanteFiscale
    
    /**
     * FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici
     * @var Condividendo\FatturaPA\Tags\TaxableEntity
     */
    private $taxableEntity;
    
    /**
     * FatturaElettronicaHeader/CessionarioCommittente/Sede
     * @var Condividendo\FatturaPA\Tags\Address
     */
    private $address;
    
            
    function __construct(){
		$this->taxableEntity = TaxableEntity::make();
		$this->address = Address::make();
	}
    
    public static function make() : self { return new self(); }		
	

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function setTaxableEntity(TaxableEntity $taxableEntity): self
    {
        $this->taxableEntity = $taxableEntity;
        return $this;
    }
    
    
    public function getTags(string $tabs){
		return  "$tabs\t<CessionarioCommittente>\r\n" .
					$this->taxableEntity->getTags("$tabs\t") . "\r\n" .
					$this->address->getTags("$tabs\t") . "\r\n" .
				"$tabs\t</CessionarioCommittente>";
	}
	
	/*    	
    public function setFirstName(string $name): self
    {
        $this->taxableEntity->setFirstName($name)));
        return $this;
    }
	
    public function setLastName(string $name): self
    {
        $this->taxableEntity->setLastName($name)));
        return $this;
    }
	
    public function setFiscalCode(string $code): self
    {
        $this->taxableEntity->setFiscalCode($code)));
        return $this;
    }
    */

}
