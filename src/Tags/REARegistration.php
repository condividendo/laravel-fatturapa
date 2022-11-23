<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigNumber;
use Condividendo\FatturaPA\Enums\LiquidationStatus as LiquidationStatusEnum;
use Condividendo\FatturaPA\Enums\ShareHolder;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class REARegistration extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\OfficeCode
     */
    private $officeCode;

    /**
     * @var \Condividendo\FatturaPA\Tags\REANumber
     */
    private $reaNumber;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\Capital
     */
    private $capital;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\ShareHolders
     */
    private $shareHolders;

    /**
     * @var \Condividendo\FatturaPA\Tags\LiquidationStatus
     */
    private $liquidationStatus;

    public function setOfficeCode(string $officeCode): self
    {
        $this->officeCode = OfficeCode::make()->setOfficeCode($officeCode);

        return $this;
    }

    public function setREANumber(string $reaNumber): self
    {
        $this->reaNumber = REANumber::make()->setREANumber($reaNumber);

        return $this;
    }

    public function setCapital(BigNumber $capital): self
    {
        $this->capital = Capital::make()->setCapital($capital);

        return $this;
    }

    public function setShareHolders(ShareHolder $shareHolders): self
    {
        $this->shareHolders = ShareHolders::make()->setShareHolders($shareHolders);

        return $this;
    }

    public function setLiquidationStatus(LiquidationStatusEnum $liquidationStatus): self
    {
        $this->liquidationStatus = LiquidationStatus::make()->setLiquidationStatus($liquidationStatus);

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('IscrizioneREA');

        $e->appendChild($this->officeCode->toDOMElement($dom));
        $e->appendChild($this->reaNumber->toDOMElement($dom));

        if ($this->capital) {
            $e->appendChild($this->capital->toDOMElement($dom));
        }

        if ($this->shareHolders) {
            $e->appendChild($this->shareHolders->toDOMElement($dom));
        }

        $e->appendChild($this->liquidationStatus->toDOMElement($dom));

        return $e;
    }
}
