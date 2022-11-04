<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentData extends AbstractEntity
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
     * @var float
     */
    private $amount;


    public function setPaymentMethod(\Condividendo\FatturaPA\Enums\PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function setPaymentExpirationDate(string $date): self
    {
        $this->paymentExpirationDate = $date;
        return $this;
    }

    public function setPaymentAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
    

    public function setPaymentCondition(\Condividendo\FatturaPA\Enums\PaymentCondition $paymentCondition): self
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
