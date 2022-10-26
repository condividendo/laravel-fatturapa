<?php
namespace Condividendo\FatturaPA\Tags;

class TransmitterContacts
{
        
    /**
     * Contatti/Email
     * @var string
     */
    protected $email;
        
    /**
     * Contatti/Telefono
     * @var string
     */
    protected $phone;
        
	
    public static function make() : self { return new self(); }	
	

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    
    public function getTags(string $tabs){
		if(!$this->phone && !$this->email) return "";
		return  "$tabs\t<ContattiTrasmittente>\r\n" .
					($this->phone ? "$tabs\t\t<Telefono>$this->phone</Telefono>\r\n" : "") .
					($this->email ? "$tabs\t\t<Email>$this->email</Email>\r\n" : "") .
				"$tabs\t</ContattiTrasmittente>";
	}
    

}
