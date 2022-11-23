<?php

namespace Condividendo\FatturaPA\Entities;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\LiquidationStatus;
use Condividendo\FatturaPA\Enums\ShareHolder;
use Condividendo\FatturaPA\Tags\REARegistration as REARegistrationTag;
use Condividendo\FatturaPA\Traits\Makeable;

class REARegistration extends Entity
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
     * @var ?\Brick\Math\BigDecimal
     */
    private $capital;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\ShareHolder
     */
    private $shareHolders;

    /**
     * @var \Condividendo\FatturaPA\Enums\LiquidationStatus
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

    public function setCapital(BigDecimal $capital): self
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

    public function getTag(): REARegistrationTag
    {
        $tag = REARegistrationTag::make()
            ->setREANumber($this->reaNumber)
            ->setOfficeCode($this->officeCode)
            ->setLiquidationStatus($this->liquidationStatus);

        if ($this->capital) {
            $tag->setCapital($this->capital);
        }

        if ($this->shareHolders) {
            $tag->setShareHolders($this->shareHolders);
        }

        return $tag;
    }
}
