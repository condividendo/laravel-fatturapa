<?php
namespace Condividendo\FatturaPA\Enums;

//<TipoDocumento>
enum Type:string
{
    case TD01 = 'TD01';
    case TD02 = 'TD02';
    case TD03 = 'TD03';
    case TD04 = 'TD04';
    case TD05 = 'TD05';
    case TD06 = 'TD06';
    
    public const FATTURA = self::TD01;
    public const NOTA_DI_CREDITO = self::TD04;
}
