<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Body extends Entity
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
     * @var \Brick\Math\BigDecimal
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
     * @var \Condividendo\FatturaPA\Entities\PaymentData
     */
    private $paymentData;

    /**
     * @var array<\Condividendo\FatturaPA\Entities\Item>
     */
    private $items;

    /**
     * @var array<\Condividendo\FatturaPA\Entities\SummaryItem>
     */
    private $summaryItems;

    public function setType(Type $type): self
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

    public function setDocumentAmount(BigDecimal $amount): self
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
     * @param array<int, \Condividendo\FatturaPA\Entities\Item> $items
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param array<int, \Condividendo\FatturaPA\Entities\SummaryItem> $items
     */
    public function setSummaryItems(array $items): self
    {
        $this->summaryItems = $items;

        return $this;
    }

    public function setPaymentData(PaymentData $paymentData): self
    {
        $this->paymentData = $paymentData;

        return $this;
    }

    public function getTag(): BodyTag
    {
        $items = [];
        $summaryItems = [];

        foreach ($this->items as $item) {
            $items[] = $item->getTag();
        }

        foreach ($this->summaryItems as $item) {
            $summaryItems[] = $item->getTag();
        }

        return BodyTag::make()
            ->setType($this->type)
            ->setCurrency($this->currency)
            ->setDocumentAmount($this->amount)
            ->setDocumentDescription($this->description)
            ->setDate($this->date)
            ->setNumber($this->number)
            ->setItems($items)
            ->setSummaryItems($summaryItems)
            ->setPaymentData($this->paymentData->getTag());
    }
}
