<?php

namespace Condividendo\FatturaPA;

use SimpleXMLElement;
use Condividendo\FatturaPA\Tags\Header;
use Condividendo\FatturaPA\Tags\Body;

// https://www.fatturapa.gov.it/export/documenti/Specifiche_tecniche_del_formato_FatturaPA_V1.3.1.pdf

class FatturaPABuilder
{
        
    /**
     * FatturaElettronica/FatturaElettronicaHeader
     * @var Condividendo\FatturaPA\Tags\Header
     */
    private Header $header;
        
    /**
     * FatturaElettronica/FatturaElettronicaBody
     * @var Condividendo\FatturaPA\Tags\Body
     */
    private Body $body;
        
        
    function __construct(){
		$this->header = Header::make();
		$this->body = Body::make();
	}
    
    
    public function setHeader(Header $header): self
    {
        $this->header = $header;
        return $this;
    }
    
    
    public function setBody(Body $body): self
    {
        $this->body = $body;
        return $this;
    }
    
    
    public static function formatDate(string $date){		
		$timestamp = strtotime($date);
		return date("Y-m-d",$timestamp);
	}
    

    public function toXML(): SimpleXMLElement
    {
		$xml = "<?xml version='1.0' standalone='yes'?>\r\n
		<q1:FatturaElettronica versione='FPR12' xmlns:q1='http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2'>\r\n" .
			$this->header->getTags("\t") . "\r\n" .
			$this->body->getTags("\t") . "\r\n" .
		"</q1:FatturaElettronica>";
        return new SimpleXMLElement($xml);
    }
    
    /*
    public function setRecipientCode(string $code): self
    {
        $this->header->setRecipientCode($code);
        return $this;
    }
    */
}
