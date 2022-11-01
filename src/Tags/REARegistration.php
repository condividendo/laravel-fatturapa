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
     * @var ?Capital
     */
    private $capital;
    
    /**
     * @var ?ShareHolders
     */
    private $shareHolders;
    
    /**
     * @var LiquidationStatus
     */
    private $liquidationStatus;


    public function setOfficeCode(string $officeCode): self
    {
        $this->officeCode = OfficeCode::make()->setOfficeCode($officeCode);
        return $this;
    }


    public function setREANumber(string $reaNumber): self
    {
        $this->reaNumber = REANumber::make()->setREANumber($reaNumber);
        return $this;
    }


    public function setCapital(float $capital): self
    {
        $this->capital = Capital::make()->setCapital($capital);
        return $this;
    }


    public function setShareHolders(string $shareHolders): self
    {
        $this->shareHolders = ShareHolders::make()->setShareHolders($shareHolders);
        return $this;
    }


    public function setLiquidationStatus(string $liquidationStatus): self
    {
        $this->liquidationStatus = LiquidationStatus::make()->setLiquidationStatus($liquidationStatus);
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
