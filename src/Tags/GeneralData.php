<?php
namespace Condividendo\FatturaPA\Tags;

class GeneralData
{
	
    /**
     * FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento
     * @var Condividendo\FatturaPA\Tags\GeneralDocumentData
     */
    private $generalDocumentData;
    
                
    function __construct(){
		$this->generalDocumentData = GeneralDocumentData::make();
	}
    
    public static function make() : self { return new self(); }		
	

    public function setGeneralDocumentData(GeneralDocumentData $generalDocumentData): self
    {
        $this->generalDocumentData = $generalDocumentData;
        return $this;
    }
    
    public function getTags(string $tabs){
		return 	"$tabs\t<DatiGenerali>\r\n" .
					$this->generalDocumentData->getTags("$tabs\t") . "\r\n" .					
				"$tabs\t</DatiGenerali>";
	}

}
