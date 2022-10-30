<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Body extends AbstractTag
{
    use Makeable;
	
    /**
     * @var GeneralData
     */
    private $generalData;
	
    /**
     * @var GoodsServicesData
     */
    private $goodsServicesData;
	
    /**
     * @var PaymentData
     */
    private $paymentData;


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

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('FatturaElettronicaBody');

        $e->appendChild($this->generalData->toDOMElement($dom));
        $e->appendChild($this->goodsServicesData->toDOMElement($dom));
        $e->appendChild($this->paymentData->toDOMElement($dom));

        return $e;
    }
}
