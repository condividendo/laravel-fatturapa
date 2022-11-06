<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Enums\LiquidationStatus;
use Condividendo\FatturaPA\Enums\ShareHolder;
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
     * @var ?ShareHolder
     */
    private $shareHolders;

    /**
     * @var ?LiquidationStatus
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


    public function setShareHolders(ShareHolder $shareHolders): self
    {
        $this->shareHolders = $shareHolders;
        return $this;
    }


    public function setLiquidationStatus(LiquidationStatus $liquidationStatus): self
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
                ->setLiquidationStatus($this->liquidationStatus ?: LiquidationStatus::LN());
        if ($this->capital) {
            $tag->setCapital($this->capital);
        }
        if ($this->shareHolders) {
            $tag->setShareHolders($this->shareHolders);
        }
        return $tag;
    }
}
