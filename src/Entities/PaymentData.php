<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\PaymentCondition;
use Condividendo\FatturaPA\Enums\PaymentMethod;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentData extends AbstractEntity
{
    use Makeable;

    /**
     * @var PaymentCondition
     */
    private $paymentCondition;

    /**
     * @var PaymentMethod
     */
    private $paymentMethod;

    /**
     * @var string
     */
    private $paymentExpirationDate;

    /**
     * @var BigDecimal
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

    /**
     * @return PaymentDataTag
     */
    public function getTag()
    {
        return PaymentDataTag::make()
            ->setPaymentCondition($this->paymentCondition)
            ->setPaymentDetail(
                \Condividendo\FatturaPA\Tags\PaymentDetail::make()
                    ->setPaymentMethod($this->paymentMethod)
                    ->setPaymentExpirationDate($this->paymentExpirationDate)
                    ->setPaymentAmount($this->amount)
            );
    }
}
