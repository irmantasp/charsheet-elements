<?php

namespace App\Tests\Provider;

use App\Model\Elements\Elements\ElementModel;
use App\Provider\ContentElementsProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContentElementsProviderTest extends KernelTestCase
{
    private ContentElementsProvider $contentElementsProvider;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->contentElementsProvider = $container->get(ContentElementsProvider::class);
        $this->indexDirectory = $container->getParameter('app.dir.index');
    }

    final public function testGetElementsFromIndexDirectory(): void
    {
        $elements = $this->contentElementsProvider->getElementsFromIndexDirectory();

        $this->assertIsArray($elements);
        $this->assertNotEmpty($elements);

        foreach ($elements as $element) {
            $this->assertInstanceOf(ElementModel::class, $element);
            $this->assertIsString($element->id);
            $this->assertIsString($element->name);
            $this->assertIsString($element->type);
            $this->assertIsString($element->source);
        }
    }

    #[DataProvider('provideTestGetElementsByTypeData')]
    final public function testGetElementsByType(string $expected): void
    {
        $elements = $this->contentElementsProvider->getElementsByType($expected);

        $this->assertIsArray($elements);
        $this->assertNotEmpty($elements);

        foreach ($elements as $element) {
            $this->assertInstanceOf(ElementModel::class, $element);
            $this->assertEquals($element->type, $expected);
        }
    }

    final public static function provideTestGetElementsByTypeData(): array
    {
        return [
            ['Source'],
            ['Race'],
            ['Class'],
            ['Background'],
        ];
    }
}