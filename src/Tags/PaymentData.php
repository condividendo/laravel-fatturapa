<?php
namespace Condividendo\FatturaPA\Tags;

class PaymentData
{
	
	const DEFAULT_PAYMENT_CONDITION = \Condividendo\FatturaPA\Enums\PaymentCondition::UNICO;
		
    /**
     * FatturaElettronicaBody/DatiPagamento/CondizioniPagamento
     * @var Condividendo\FatturaPA\Enums\PaymentCondition
     */
    private $paymentCondition;
		
    /**
     * FatturaElettronicaBody/DatiPagamento/DettaglioPagamento
     * @var Condividendo\FatturaPA\Tags\PaymentDetail
     */
    private $paymentDetail;
    
	
                
    function __construct(){
		$this->paymentCondition = self::DEFAULT_PAYMENT_CONDITION;
		$this->paymentDetail = PaymentDetail::make();
	}
	
    
    public static function make() : self { return new self(); }		
        
    
    public function setPaymentCondition(\Condividendo\FatturaPA\Enums\PaymentCondition $paymentCondition): self
    {
        $this->paymentCondition = $paymentCondition;
        return $this;
    }
    
    public function setPaymentDetail(\Condividendo\FatturaPA\Tags\PaymentDetail $paymentDetail): self
    {
        $this->paymentDetail = $paymentDetail;
        return $this;
    }
    
    
    public function getTags(string $tabs){
		return  "$tabs\t<DatiPagamento>\r\n" .
					"$tabs\t\t<CondizioniPagamento>{$this->paymentCondition->value}</CondizioniPagamento>\r\n" .
					$this->paymentDetail->getTags("$tabs\t") . "\r\n" .
				"$tabs\t</DatiPagamento>";
	}
	
}
