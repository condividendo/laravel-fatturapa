<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Enums\PaymentCondition;
use Condividendo\FatturaPA\Enums\PaymentMethod;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Tags\PaymentDetail;
use Condividendo\FatturaPA\Traits\Makeable;
use Condividendo\FatturaPA\Traits\UsesDate;
use Condividendo\FatturaPA\Traits\UsesDecimal;
use Illuminate\Support\Carbon;
use RuntimeException;

class Body extends Entity
{
    use Makeable;
    use UsesDate;
    use UsesDecimal;

    /**
     * @var \Condividendo\FatturaPA\Enums\Type
     */
    private $type;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var ?\Illuminate\Support\Carbon
     */
    private $date = null;

    /**
     * @var ?\Brick\Math\BigDecimal
     */
    private $amount = null;

    /**
     * @var ?string
     */
    private $description = null;

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

    public function type(Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function currency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string|\Illuminate\Support\Carbon $date
     * @return $this
     */
    public function date($date): self
    {
        $this->date = static::makeDate($date);

        return $this;
    }

    /**
     * @param string|\Brick\Math\BigDecimal $amount
     * @return $this
     */
    public function documentAmount($amount): self
    {
        $this->amount = static::makeDecimal($amount);

        return $this;
    }

    public function documentDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function number(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param array<int, \Condividendo\FatturaPA\Entities\Item> $items
     */
    public function items(array $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param array<int, \Condividendo\FatturaPA\Entities\SummaryItem> $items
     */
    public function summaryItems(array $items): self
    {
        $this->summaryItems = $items;

        return $this;
    }

    public function paymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function paymentExpirationDate(string $date): self
    {
        $this->paymentExpirationDate = $date;

        return $this;
    }

    /**
     * @param string|\Brick\Math\BigDecimal $amount
     * @return $this
     */
    public function paymentAmount($amount): self
    {
        $this->paymentAmount = static::makeDecimal($amount);

        return $this;
    }

    public function paymentCondition(PaymentCondition $paymentCondition): self
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
            ->setDate($this->date ?: Carbon::today())
            ->setNumber($this->number)
            ->setItems($items)
            ->setSummaryItems($summaryItems);

        if ($this->amount) {
            $body->setDocumentAmount($this->amount);
        }

        if ($this->description) {
            $body->setDocumentDescription($this->description);
        }

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
