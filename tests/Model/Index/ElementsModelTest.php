<?php

namespace App\Tests\Model\Index;

use App\Model\Index\ElementsModel;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ElementsModelTest extends KernelTestCase
{

    private ?SerializerInterface $serializer = null;

    private ?string $file = null;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->serializer = $container->get('jms_serializer');
        $this->file = file_get_contents(__DIR__ . '/example.xml');
    }

    final public function testElementsModelSerialize(): void
    {
        $model = $this->serializer->deserialize($this->file, ElementsModel::class, 'xml');
        $content = $this->serializer->serialize($model, 'xml');

        $this->assertXmlStringEqualsXmlString($this->file, $content);
    }

}