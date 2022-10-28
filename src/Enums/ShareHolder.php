<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self SU() Socio unico
 * @method static self SM() Soci multipli
 */
final class ShareHolder extends Enum
{
    const SU = 'SU';
    const SM = 'SM';
}
