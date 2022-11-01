<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self I() Immediata
 * @method static self D() Differita
 */
final class VatCollectionMode extends Enum
{
    public const I = 'I';
    public const D = 'D';
}
