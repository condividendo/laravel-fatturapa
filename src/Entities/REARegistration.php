<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\REARegistration as REARegistrationTag;
use Condividendo\FatturaPA\Traits\Makeable;

class REARegistration extends AbstractEntity
{
    use Makeable;

    /**
     * @var string
     */
    private $officeCode;

    /**
     * @var string
     */
    private $reaNumber;

    /**
     * @var ?float
     */
    private $capital;

    /**
     * @var ?ShareHolders
     */
    private $shareHolders;

    /**
     * @var LiquidationStatus
     */
    private $liquidationStatus;


    public function setOfficeCode(string $officeCode): self
    {
        $this->officeCode = $officeCode;
        return $this;
    }


    public function setREANumber(string $reaNumber): self
    {
        $this->reaNumber = $reaNumber;
        return $this;
    }


    public function setCapital(float $capital): self
    {
        $this->capital = $capital;
        return $this;
    }


    public function setShareHolders(\Condividendo\FatturaPA\Enums\ShareHolder $shareHolders): self
    {
        $this->shareHolders = $shareHolders;
        return $this;
    }


    public function setLiquidationStatus(\Condividendo\FatturaPA\Enums\LiquidationStatus $liquidationStatus): self
    {
        $this->liquidationStatus = $liquidationStatus;
        return $this;
    }

    /**
     * @return REARegistrationTag
     */
    public function getTag()
    {
        $tag = REARegistrationTag::make()
                ->setREANumber($this->reaNumber)
                ->setOfficeCode($this->officeCode)
                ->setLiquidationStatus($this->liquidationStatus ?: \Condividendo\FatturaPA\Enums\LiquidationStatus::LN());
        if($this->capital){
            $tag->setCapital($this->capital);
        }
        if($this->shareHolders){
            $tag->setShareHolders($this->shareHolders);
        }
        return $tag;
    }
}
