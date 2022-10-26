<?php
namespace Condividendo\FatturaPA\Enums;

//<EsibilitaIva>
enum VatCollection:string
{
    case I = 'I';
    case D = 'D';
    
    public const IMMEDIATA = self::I;
    public const DIFFERITA = self::D;
}
