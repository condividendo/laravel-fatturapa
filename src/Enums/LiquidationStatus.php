<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self LS() la società è in stato di liquidazione.
 * @method static self LN() la società non è in stato di liquidazione.
 */
final class LiquidationStatus extends Enum
{
    const LS = 'LS';
    const LN = 'LN';
}
