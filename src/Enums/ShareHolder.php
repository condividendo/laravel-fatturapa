<?php
namespace Condividendo\FatturaPA\Enums;

// <SocioUnico>
enum ShareHolder:string
{
    case SU = 'SU';
    case SM = 'SM';
    
    public const SOCIO_UNICO = self::SU;
    public const PLURIPERSONALE = self::SM;
}
