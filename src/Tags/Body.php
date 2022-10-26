<?php
namespace Condividendo\FatturaPA\Tags;

class Body
{
	
    /**
     * FatturaElettronicaBody/DatiGenerali
     * @var Condividendo\FatturaPA\Tags\GeneralData
     */
    private $generalData;
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi
     * @var Condividendo\FatturaPA\Tags\GoodsServicesData
     */
    private $goodsServicesData;
	
    /**
     * FatturaElettronicaBody/DatiPagamento
     * @var Condividendo\FatturaPA\Tags\PaymentData
     */
    private $paymentData;
    
                
    function __construct(){
		$this->generalData = GeneralData::make();
		$this->goodsServicesData = GoodsServicesData::make();
		$this->paymentData = PaymentData::make();
	}
    
    public static function make() : self { return new self(); }		
	

    public function setGeneralData(GeneralData $generalData): self
    {
        $this->generalData = $generalData;
        return $this;
    }

    public function setGoodsServicesData(GoodsServicesData $gsData): self
    {
        $this->goodsServicesData = $gsData;
        return $this;
    }

    public function setPaymentDataData(PaymentData $paymentData): self
    {
        $this->paymentData = $paymentData;
        return $this;
    }
    
    public function getTags(string $tabs){
		return 	"$tabs\t<FatturaElettronicaBody>\r\n" .
					$this->generalData->getTags("$tabs\t") . "\r\n" .
					$this->goodsServicesData->getTags("$tabs\t") . "\r\n" .
					$this->paymentData->getTags("$tabs\t") . "\r\n" .
				"$tabs\t</FatturaElettronicaBody>";
	}

}
