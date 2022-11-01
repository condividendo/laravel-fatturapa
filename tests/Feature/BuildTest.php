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
        /** @var string $xml */
        $xml = FatturaPA::build()
            ->setSenderId('IT', '0123456789')
            ->setTransmissionSequence('1')
            ->setTransmissionFormat(TransmissionFormat::FPR12())
            ->setRecipientCode('ABC1234')
            ->addBody(
                Body::make()
            )
            ->toXML()
            ->asXML();

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../fixtures/1.xml', $xml);
    }
}
