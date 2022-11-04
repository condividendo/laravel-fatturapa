<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\GeneralData as GeneralDataTag;
use Condividendo\FatturaPA\Tags\GeneralDocumentData as GeneralDocumentDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class GeneralData extends AbstractEntity
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
     * @var string
     */
    private $number;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $description;


    public function setType(\Condividendo\FatturaPA\Enums\Type $type): self
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
