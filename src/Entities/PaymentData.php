<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\PaymentCondition;
use Condividendo\FatturaPA\Enums\PaymentMethod;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Tags\PaymentDetail;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentData extends Entity
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\PaymentCondition
     */
    private $paymentCondition;

    /**
     * @var \Condividendo\FatturaPA\Enums\PaymentMethod
     */
    private $paymentMethod;

    /**
     * @var string
     */
    private $paymentExpirationDate;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $amount;

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
        $this->amount = $amount;

        return $this;
    }

    public function setPaymentCondition(PaymentCondition $paymentCondition): self
    {
        $this->paymentCondition = $paymentCondition;

        return $this;
    }

    public function getTag(): PaymentDataTag
    {
        return PaymentDataTag::make()
            ->setPaymentCondition($this->paymentCondition)
            ->setPaymentDetail(
                PaymentDetail::make()
                    ->setPaymentMethod($this->paymentMethod)
                    ->setPaymentExpirationDate($this->paymentExpirationDate)
                    ->setPaymentAmount($this->amount)
            );
    }
}
