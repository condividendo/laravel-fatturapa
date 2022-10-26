<?php
namespace Condividendo\FatturaPA\Tags;

// TODO: <RappresentanteFiscale>
    
class Supplier
{
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici
     * @var Condividendo\FatturaPA\Tags\TaxableEntity
     */
    private $taxableEntity;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/Sede
     * @var Condividendo\FatturaPA\Tags\Addresss
     */
    private $address;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/IscrizioneREA
     * @var Condividendo\FatturaPA\Tags\REARegistration
     */
    private $reaRegistration;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/Contatti
     * @var Condividendo\FatturaPA\Tags\Contacts
     */
    private $contacts;
        
                
    function __construct(){
		$this->taxableEntity = TaxableEntity::make();
		$this->address = Address::make();		
		$this->reaRegistration = REARegistration::make();		
		$this->contacts = Contacts::make();		
	}
	
	
    public static function make() : self { return new self(); }	
	

    public function setTaxableEntity(TaxableEntity $e): self
    {
        $this->taxableEntity = $e;
        return $this;
    }
	
    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }
	
    public function setReaRegistration(REARegistration $reaRegistration): self
    {
        $this->reaRegistration = $reaRegistration;
        return $this;
    }
	
    public function setContacts(Contacts $contacts): self
    {
        $this->contacts = $contacts;
        return $this;
    }
    
    public function getTags(string $tabs){
		return  "$tabs\t<CedentePrestatore>\r\n" .
					$this->taxableEntity->getTags("$tabs\t") . "\r\n" .
					$this->address->getTags("$tabs\t") . "\r\n" .
					$this->reaRegistration->getTags("$tabs\t") . "\r\n" .
					$this->contacts->getTags("$tabs\t") . "\r\n" .
				"$tabs\t</CedentePrestatore>";
	}
	
	/*	
    public function setVatNumber(string $vat, string $countryCode="IT"): self
    {
        $this->taxableEntity->setVatNumber(VatNumber::make()->setVat($vat)->setCountryCode($countryCode));
        return $this;
    }
	
    public function setName(string $name): self
    {
        $this->taxableEntity->setCompanyName($name)));
        return $this;
    }
    */    

}
