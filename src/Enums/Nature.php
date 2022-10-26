<?php
namespace Condividendo\FatturaPA\Enums;

// <Natura>
enum Nature:string
{
    case N2_2 = 'N2.2';
    case N3_1 = 'N3.1';
    case N3_3 = 'N3.3';    
    
    public const NOT_APPLICABLE_EXPORT = self::N3_1;
    public const NOT_APPLICABLE_OTHER = self::N2_2;
    
    public const SM = self::N3_3;
    public const VA = self::N3_3;
    public const NOT_APPLICABLE_VATICAN = self::N3_3;
    public const NOT_APPLICABLE_SAN_MARINO = self::N3_3;
}
