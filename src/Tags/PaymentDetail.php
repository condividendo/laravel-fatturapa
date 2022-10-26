<?php
namespace Condividendo\FatturaPA\Tags;

class PaymentDetail
{
	
	const DEFAULT_PAYMENT_METHOD = \Condividendo\FatturaPA\Enums\PaymentMethod::BONIFICO;
		
    /**
     * FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento
     * @var Condividendo\FatturaPA\Enums\PaymentMethod
     */
    private $paymentMethod;
		
    /**
     * FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataScadenzaPagamento
     * @var string
     */
    private $paymentExpirationDate;    
		
    /**
     * FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ImportoPagamento
     * @var float
     */
    private $amount;    
	
                
    function __construct(){
		$this->paymentMethod = self::DEFAULT_PAYMENT_METHOD;
	}
	
    
    public static function make() : self { return new self(); }		
        
    
    public function setPaymentMethod(\Condividendo\FatturaPA\Enums\PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }
    
    public function setPaymentExpirationDate(string $date): self
    {
		$this->paymentExpirationDate = \Condividendo\FatturaPA\FatturaPABuilder::formatDate($date);
        return $this;
    }
    
    public function setPaymentAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
    
    
    public function getTags(string $tabs){
		return  "$tabs\t<DettaglioPagamento>\r\n" .
					"$tabs\t\t<ModalitaPagamento>{$this->paymentMethod->value}</ModalitaPagamento>\r\n" .
					"$tabs\t\t<DataScadenzaPagamento>$this->paymentExpirationDate</DataScadenzaPagamento>\r\n" .
					"$tabs\t\t<ImportoPagamento>$this->amount</ImportoPagamento>\r\n" .
				"$tabs\t</DettaglioPagamento>";
	}
	
}
