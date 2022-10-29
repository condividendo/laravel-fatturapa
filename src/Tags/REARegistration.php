<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class REARegistration extends AbstractTag
{
    use Makeable;
        
    /**
     * @var OfficeCode
     */
    private $officeCode;
    
    /**
     * @var REANumber
     */
    private $reaNumber;
    
    /**
     * @var Capital
     */
    private $capital;
    
    /**
     * @var ShareHolders
     */
    private $shareHolders;
    
    /**
     * @var LiquidationStatus
     */
    private $liquidationStatus;


    public function setOfficeCode(OfficeCode $officeCode): self
    {
        $this->officeCode = $officeCode;
        return $this;
    }


    public function setREANumber(REANumber $reaNumber): self
    {
        $this->reaNumber = $reaNumber;
        return $this;
    }


    public function setCapital(Capital $capital): self
    {
        $this->capital = $capital;
        return $this;
    }


    public function setShareHolders(ShareHolders $shareHolders): self
    {
        $this->shareHolders = $shareHolders;
        return $this;
    }


    public function setLiquidationStatus(LiquidationStatus $liquidationStatus): self
    {
        $this->liquidationStatus = $liquidationStatus;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('IscrizioneREA');

        $e->appendChild($this->officeCode->toDOMElement($dom));
        $e->appendChild($this->reaNumber->toDOMElement($dom));        
        if($this->capital) $e->appendChild($this->capital->toDOMElement($dom));
        if($this->shareHolders) $e->appendChild($this->shareHolders->toDOMElement($dom));
        $e->appendChild($this->liquidationStatus->toDOMElement($dom));
        

        return $e;
    }

}
