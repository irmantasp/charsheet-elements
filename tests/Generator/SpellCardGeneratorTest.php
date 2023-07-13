<?php

namespace App\Tests\Generator;

use App\Factory\SpellFactory;
use App\Generator\SpellCardGenerator;
use App\Model\Elements\Elements\ElementModel;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SpellCardGeneratorTest extends KernelTestCase
{
    private SpellCardGenerator $generator;
    private ?SerializerInterface $serializer = null;
    private ?string $directory = null;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->generator = $container->get(SpellCardGenerator::class);
        $this->serializer = $container->get('jms_serializer');
        $this->directory = __DIR__ . '/fixtures/' . $this->getName(false) . '/';
    }

    final public function testGenerate(): void {
        $fileContent = file_get_contents($this->directory . 'spell_card.xml');
        $model = $this->serializer->deserialize($fileContent, ElementModel::class, 'xml');
        $spell = SpellFactory::createFromModel($model);
        $pdf = $this->generator->generate($spell);

        file_put_contents($this->directory . 'results/spell_card.pdf', $pdf);
        $a = 1;
    }
}