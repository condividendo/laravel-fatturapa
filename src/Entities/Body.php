<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\PaymentCondition;
use Condividendo\FatturaPA\Enums\PaymentMethod;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Tags\PaymentDetail;
use Condividendo\FatturaPA\Traits\Makeable;
use RuntimeException;

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
     * @var ?\Condividendo\FatturaPA\Enums\PaymentCondition
     */
    private $paymentCondition = null;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\PaymentMethod
     */
    private $paymentMethod = null;

    /**
     * @var ?string
     */
    private $paymentExpirationDate = null;

    /**
     * @var ?\Brick\Math\BigDecimal
     */
    private $paymentAmount = null;

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

    public function setPaymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function setPaymentExpirationDate(string $date): self
    {
        $this->paymentExpirationDate = $date;

        return $this;
    }

    public function setPaymentAmount(BigDecimal $amount): self
    {
        $this->paymentAmount = $amount;

        return $this;
    }

    public function setPaymentCondition(PaymentCondition $paymentCondition): self
    {
        $this->paymentCondition = $paymentCondition;

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

        $body = BodyTag::make()
            ->setType($this->type)
            ->setCurrency($this->currency)
            ->setDocumentAmount($this->amount)
            ->setDocumentDescription($this->description)
            ->setDate($this->date)
            ->setNumber($this->number)
            ->setItems($items)
            ->setSummaryItems($summaryItems);

        $paymentData = $this->getPaymentDataTag();

        if ($paymentData) {
            $body->setPaymentData($paymentData);
        }

        return $body;
    }

    private function getPaymentDataTag(): ?PaymentDataTag
    {
        if (!$this->paymentCondition) {
            return null;
        }

        if (!$this->paymentMethod || !$this->paymentAmount) {
            throw new RuntimeException("'paymentMethod' and 'paymentAmount' cannot be null!");
        }

        $detail = PaymentDetail::make()
            ->setPaymentMethod($this->paymentMethod)
            ->setPaymentAmount($this->paymentAmount);

        if ($this->paymentExpirationDate) {
            $detail->setPaymentExpirationDate($this->paymentExpirationDate);
        }

        return PaymentDataTag::make()
            ->setPaymentCondition($this->paymentCondition)
            ->setPaymentDetail($detail);
    }
}
