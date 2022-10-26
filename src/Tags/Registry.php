<?php
namespace Condividendo\FatturaPA\Tags;

class Registry
{
    
    /**
     * DatiAnagrafici/Anagrafica/Denominazione
     * @var string
     */
    private $companyName;    
    
    /**
     * DatiAnagrafici/Anagrafica/Nome
     * @var string
     */
    private $firstName;    
    
    /**
     * DatiAnagrafici/Anagrafica/Cognome
     * @var string
     */
    private $lastName;    
    
    /**
     * DatiAnagrafici/Anagrafica/Titolo
     * @var string
     */
    private $title;    
    
    
    public static function make() : self { return new self(); }	
	

    public function setFirstName(string $name): self
    {
        $this->firstName = $name;
        return $this;
    }

    public function setLastName(string $name): self
    {
        $this->lastName = $name;
        return $this;
    }

    public function setCompanyName(string $name): self
    {
        $this->companyName = $name;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    public function getTags(string $tabs){
		return  "$tabs\t<Anagrafica>\r\n" .
					($this->companyName ? "$tabs\t\t<Denominazione>$this->companyName</Denominazione>\r\n" : "") .
					($this->firstName ? "$tabs\t\t<Nome>$this->firstName</Nome>\r\n" : "") .
					($this->lastName ? "$tabs\t\t<Cognome>$this->lastName</Cognome>\r\n" : "") .
					($this->title ? "$tabs\t\t<Titolo>$this->lastName</Titolo>\r\n" : "") .
				"$tabs\t</Anagrafica>";
	}

}
