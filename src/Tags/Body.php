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


    public function setType(\Condividendo\FatturaPA\Enums\Type $type): self
    {
        $this->generalData->setType($type);
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->generalData->setCurrency($currency);
        return $this;
    }

    public function setDate(string $date): self
    {
        $this->generalData->setDate($date);
        return $this;
    }

    public function setDocumentAmount(float $amount): self
    {
        $this->generalData->setDocumentAmount($amount);
        return $this;
    }

    public function setDocumentDescription(string $description): self
    {
        $this->generalData->setDocumentDescription($description);
        return $this;
    }

    public function setNumber(string $number): self
    {
        $this->generalData->setDocumentNumber($number);
        return $this;
    }


    /**
     * @param array<int, Item> $items
     */
    public function setItems(array $items): self
    {
        $this->goodsServicesData->setItems($items);
        return $this;
    }


    /**
     * @param array<int, SummaryItem> $items
     */
    public function setSummaryItems(array $items): self
    {
        $this->goodsServicesData->setSummaryItems($items);
        return $this;
    }


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

    public function setPaymentData(PaymentData $paymentData): self
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
