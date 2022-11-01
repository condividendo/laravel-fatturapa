<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self FPA12() Fattura verso PA
 * @method static self FPR12() Fattura verso privati
 */
final class TransmissionFormat extends Enum
{
    public const FPA12 = 'FPA12';
    public const FPR12 = 'FPR12';
}
