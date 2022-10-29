<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self I() Immediata
 * @method static self D() Differita
 */
final class VatCollection extends Enum
{
    const I = 'I';
    const D = 'D';
}