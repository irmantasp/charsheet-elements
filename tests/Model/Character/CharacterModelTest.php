<?php

namespace App\Tests\Model\Character;

use App\Model\Character\CharacterModel;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CharacterModelTest extends KernelTestCase
{

    private ?SerializerInterface $serializer = null;

    private ?string $file = null;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->serializer = $container->get('jms_serializer');
        $this->file = file_get_contents(__DIR__ . '/1 level no data 4d6.dnd5e');
    }

    final public function testCharacterModelDeserialize(): void
    {

    }

    final public function testCharacterModelSerialize(): void
    {
        $model = $this->serializer->deserialize($this->file, CharacterModel::class, 'xml');
        $content = $this->serializer->serialize($model, 'xml');

        $this->assertXmlStringEqualsXmlString($this->file, $content);
    }

}