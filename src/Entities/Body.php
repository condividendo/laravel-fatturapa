<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Body extends AbstractEntity
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\Type
     */
    private $type;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $date;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $number;

    /**
     * @var PaymentData
     */
    private $paymentData;

    /**
     * @var Item[]
     */
    private $items;

    /**
     * @var SummaryItem[]
     */
    private $summaryItems;


    public function setType(\Condividendo\FatturaPA\Enums\Type $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function setDocumentAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function setDocumentDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @param array<int, Item> $items
     */
    public function setItems(array $items): self
    {
        $this->$items = $items;
        return $this;
    }

    /**
     * @param array<int, SummaryItem> $items
     */
    public function setSummaryItems(array $items): self
    {
        $this->summaryItems = $items;
        return $this;
    }
    

    public function setPaymentDataData(PaymentData $paymentData): self
    {
        $this->paymentData = $paymentData;
        return $this;
    }

    /**
     * @return BodyTag
     */
    public function getTag()
    {
        return BodyTag::make()
                ->setType($this->type)
                ->setCurrency($this->currency)
                ->setDocumentAmount($this->amount)
                ->setDocumentDescription($this->description)
                ->setDate($this->date)
                ->setNumber($this->number)
                ->setItems($this->items)
                ->setSummaryItems($this->summaryItems)
                ->setPaymentData($this->paymentData);
    }
}
