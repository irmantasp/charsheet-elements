<?php

namespace App\Tests\Manager;

use App\Manager\SourcesManager;
use App\Model\Character\Character\Sources\Restricted\SourceModel;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SourceManagerTest extends KernelTestCase
{
    private SourcesManager $sourceManager;
    private ?SerializerInterface $serializer = null;
    private ?string $directory = null;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->sourceManager = $container->get(SourcesManager::class);
        $this->serializer = $container->get('jms_serializer');
        $this->directory = __DIR__ . '/fixtures/' . $this->getName(false) . '/';
    }

    final public function testRestrictSourceElementsFromLostMineOfPhandelverSource(): void
    {
        $restrictedSources = $this->sourceManager->restrictSourceElements('Lost Mine of Phandelver');

        $sources = $restrictedSources->restricted->sources;
        $this->assertIsArray($sources);
        $this->assertCount(1, $sources);

        $source = reset($sources);
        $this->assertInstanceOf(SourceModel::class, $source);
        $this->assertEquals('Lost Mine of Phandelver', $source->value);
        $this->assertEquals('ID_WOTC_SOURCE_LOST_MINE_OF_PHANDELVER', $source->id);

        $elements = $restrictedSources->restricted->elements;
        $this->assertIsArray($elements);
        $this->assertCount(5, $elements);

        $this->assertEquals('ID_WOTC_LMOP_MAGIC_ITEM_DRAGONGUARD', $elements[0]->value);
        $this->assertEquals('ID_WOTC_LMOP_MAGIC_ITEM_HEW', $elements[1]->value);
        $this->assertEquals('ID_WOTC_LMOP_MAGIC_ITEM_LIGHTBRINGER', $elements[2]->value);
        $this->assertEquals('ID_WOTC_LMOP_MAGIC_ITEM_STAFF_OF_DEFENSE', $elements[3]->value);
        $this->assertEquals('ID_WOTC_LMOP_MAGIC_ITEM_SPIDER_STAFF', $elements[4]->value);

        $serializedRestrictedSources = $this->serializer->serialize($restrictedSources, 'xml');
        $fileContent = file_get_contents($this->directory . 'sources.xml');

        $this->assertXmlStringEqualsXmlString($fileContent, $serializedRestrictedSources);
    }

    final public function testRestrictPlayTestSourceElements(): void
    {
        $restrictedSources = $this->sourceManager->restrictPlayTestSourceElements();
        $sources = $restrictedSources->restricted->sources;
        $this->assertIsArray($sources);
        $this->assertCount(72, $sources);
    }
}