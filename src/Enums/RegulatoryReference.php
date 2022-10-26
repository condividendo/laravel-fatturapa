<?php
namespace Condividendo\FatturaPA\Enums;

// <<RiferimentoNormativo>
enum RegulatoryReference:string
{
    case N3_3 = 'Non Imponibile cessioni verso San Marino e Citta del Vaticano Art. 71 Dpr 633/72';    
    
    public const SM = self::N3_3;
    public const SAN_MARINO = self::N3_3;
    public const VA = self::N3_3;
    public const VATICAN = self::N3_3;
}
