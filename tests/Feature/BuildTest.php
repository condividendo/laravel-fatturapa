<?php

namespace Condividendo\FatturaPA\Tests\Feature;

use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\FatturaPA;
use Condividendo\FatturaPA\Tests\TestCase;

class BuildTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_build()
    {
        $xml = FatturaPA::build()
            ->setTransmissionFormat(TransmissionFormat::FPR12())
            ->setSenderId('IT', '0123456789')
            ->setTransmissionSequence('1')
            ->addBody(
                Body::make()
            )
            ->toXML();

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../fixtures/1.xml', $xml->asXML());
    }
}
