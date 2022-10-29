<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentDetail extends AbstractTag
{
    use Makeable;
        
    /**
     * @var PaymentMethod
     */
    private $paymentMethod;
		
    /**
     * @var PaymentExpirationDate
     */
    private $paymentExpirationDate;    
		
    /**
     * @var PaymentAmount
     */
    private $amount; 
    

    public function setPaymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }
    
    public function setPaymentExpirationDate(PaymentExpirationDate $date): self
    {
		$this->paymentExpirationDate = $date;
        return $this;
    }
    
    public function setPaymentAmount(PaymentAmount $amount): self
    {
        $this->amount = $amount;
        return $this;
    } 


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DettaglioPagamento');

        $e->appendChild($this->paymentMethod->toDOMElement($dom));
        $e->appendChild($this->paymentExpirationDate->toDOMElement($dom));        
        $e->appendChild($this->amount->toDOMElement($dom));
        

        return $e;
    }
    
}
