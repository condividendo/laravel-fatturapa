<?php
namespace Condividendo\FatturaPA\Tags;

class TransmissionData
{
	
	const RECIPIENT_CODE_IF_PEC_PROVIDED = "0000000";
	const RECIPIENT_CODE_FOR_OTHER_COUNTRIES = "XXXXXXX";
	const DEFAULT_TRANSMISSION_FORMAT = \Condividendo\FatturaPA\Enums\TransmissionFormat::FPR12;
	
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/IdTrasmittente
     * @var Condividendo\FatturaPA\Tags\TransmitterId
     */
    private $transmitterId;
	
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/ContattiTrasmittente
     * @var Condividendo\FatturaPA\Tags\TransmitterContacts
     */
    private $transmitterContacts;
        
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/ProgressivoInvio
     * @var int
     */
    private $number;
    
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/FormatoTrasmissione
     * @var Condividendo\FatturaPA\Enums\TransmissionFormat
     */
    private $format;
    
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/CodiceDestinatario
     * @var string
     */
    private $recipientCode;
    
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/PECDestinatario
     * @var string
     */
    private $recipientPec;
        
        
    function __construct(){
		$this->transmitterId = TransmitterId::make();
		$this->transmitterContacts = TransmitterContacts::make();
		$this->format = self::DEFAULT_TRANSMISSION_FORMAT;
	}
            
    public static function make() : self { return new self(); }	
	

    public function setTransmitterId(TransmitterId $tId): self
    {
        $this->transmitterId = $tId;
        return $this;
    }

    public function setTransmitterContacts(TransmitterContacts $tContacts): self
    {
        $this->transmitterContacts = $tContacts;
        return $this;
    }
    
    public function setRecipientCode(string $code): self
    {
        $this->recipientCode = $code;
        return $this;
    }

    public function setRecipientPec(string $recipientPec): self
    {
        $this->recipientPec = $recipientPec;
        return $this;
    }

    public function setFormat(\Condividendo\FatturaPA\Enums\TransmissionFormat $format): self
    {
        $this->format = $format;
        return $this;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }
    
    public function getTags(string $tabs){
		return  "$tabs\t<DatiTrasmissione>\r\n" .
					$this->transmitterId->getTags("$tabs\t") . "\r\n" .
					$this->transmitterContacts->getTags("$tabs\t") . "\r\n" .
					"$tabs\t\t<ProgressivoInvio>$this->number</ProgressivoInvio>\r\n" .
					"$tabs\t\t<FormatoTrasmissione>{$this->format->value}</FormatoTrasmissione>\r\n" .
					"$tabs\t\t<CodiceDestinatario>" . ($this->recipientPec ? self::RECIPIENT_CODE_IF_PEC_PROVIDED : ($this->recipientCode ?: self::RECIPIENT_CODE_FOR_OTHER_COUNTRIES)) . "</CodiceDestinatario>\r\n" .
					($this->recipientPec ? "$tabs\t\t<PECDestinatario>$this->recipientPec</PECDestinatario>\r\n" : "") .
				"$tabs\t</DatiTrasmissione>";
	}

	/*
    public function setCountryCode(string $code): self
    {
        $this->transmitterId->setCountryCode($code);
        return $this;
    }

    public function setCode(string $code): self
    {
        $this->transmitterId->setCode($code);
        return $this;
    }
    */
    
}
