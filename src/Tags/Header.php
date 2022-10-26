<?php
namespace Condividendo\FatturaPA\Tags;

class Header
{
		
    /**
     * FatturaElettronicaHeader/DatiTrasmissione
     * @var Condividendo\FatturaPA\Tags\TransmissionData
     */
    private $transmissionData;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore
     * @var Condividendo\FatturaPA\Tags\Supplier
     */
    private $supplier;
    
    /**
     * FatturaElettronicaHeader/CessionarioCommittente
     * @var Condividendo\FatturaPA\Tags\Customer
     */
    private $customer;
    
            
    function __construct(){
		$this->transmissionData = TransmissionData::make();
		$this->supplier = Supplier::make();
		$this->customer = Customer::make();
	}
    
    public static function make() : self { return new self(); }		
	

    public function setTransmissionData(TransmissionData $transmissionData): self
    {
        $this->transmissionData = $transmissionData;
        return $this;
    }

    public function setSupplier(Supplier $supplier): self
    {
        $this->supplier = $supplier;
        return $this;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }
    
    public function getTags(string $tabs){
		return  "$tabs\t<FatturaElettronicaHeader>\r\n" .
					$this->transmissionData->getTags("$tabs\t") . "\r\n" .
					$this->supplier->getTags("$tabs\t") . "\r\n" .
					$this->customer->getTags("$tabs\t") . "\r\n" .
				"$tabs\t</FatturaElettronicaHeader>";
	}

	/*
    public function setRecipientCode(string $code): self
    {
        $this->transmissionData->setRecipientCode($code);
        return $this;
    }
    */

}
