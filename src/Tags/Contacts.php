<?php
namespace Condividendo\FatturaPA\Tags;

class Contacts extends TransmitterContacts
{
        
    /**
     * Contatti/Fax
     * @var string
     */
    private $fax;
        
	
    public static function make() : self { return new self(); }	
	

    public function setFax(string $fax): self
    {
        $this->fax = $fax;
        return $this;
    }    

    
    public function getTags(string $tabs){
		if(!$this->phone && !$this->email) return "";
		return  "$tabs\t<Contatti>\r\n" .
					($this->phone ? "$tabs\t\t<Telefono>$this->phone</Telefono>\r\n" : "") .
					($this->email ? "$tabs\t\t<Email>$this->email</Email>\r\n" : "") .
					($this->fax ? "$tabs\t\t<Fax>$this->fax</Fax>\r\n" : "") .
				"$tabs\t</Contatti>";
	}

}
