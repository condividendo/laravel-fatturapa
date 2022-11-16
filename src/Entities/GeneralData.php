<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\Tags\GeneralData as GeneralDataTag;
use Condividendo\FatturaPA\Tags\GeneralDocumentData as GeneralDocumentDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class GeneralData extends AbstractEntity
{
    use Makeable;

    /**
     * @var Type
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
     * @var string
     */
    private $number;

    /**
     * @var BigDecimal
     */
    private $amount;

    /**
     * @var string
     */
    private $description;


    public function setType(Type $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
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

    public function setDocumentNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return GeneralDataTag
     */
    public function getTag()
    {
        return GeneralDataTag::make()
                ->setGeneralDocumentData(
                    GeneralDocumentDataTag::make()
                    ->setType($this->type)
                    ->setDate($this->date)
                    ->setCurrency($this->currency)
                    ->setDocumentAmount($this->amount)
                    ->setDocumentDescription($this->description)
                    ->setDocumentNumber($this->number)
                );
    }
}
