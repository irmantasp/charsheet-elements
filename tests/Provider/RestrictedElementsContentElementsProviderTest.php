<?php

namespace App\Tests\Provider;

use App\Manager\SourcesManager;
use App\Provider\RestrictedElementsContentElementsProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RestrictedElementsContentElementsProviderTest extends KernelTestCase
{
    private ?SourcesManager $sourcesManager;
    private ?RestrictedElementsContentElementsProvider $elementsProvider = null;
    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->sourcesManager = $container->get(SourcesManager::class);
        $this->elementsProvider = $container->get(RestrictedElementsContentElementsProvider::class);
    }

    final public function testGetElementsFromIndexDirectoryLostMineOfPhandelverRestricted(): void
    {
        $this->elementsProvider->setRestrictions();
        $elements = $this->elementsProvider->getElementsFromIndexDirectory();

        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_DRAGONGUARD', $elements);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_HEW', $elements);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_LIGHTBRINGER', $elements);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_STAFF_OF_DEFENSE', $elements);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_SPIDER_STAFF', $elements);

        $sourcesRestrictions = $this->sourcesManager->restrictSourceElements('Lost Mine of Phandelver');
        $this->elementsProvider->setRestrictions($sourcesRestrictions->restricted);
        $elementsAfterRestrictions = $this->elementsProvider->getElementsFromIndexDirectory();

        $this->assertArrayNotHasKey('ID_WOTC_LMOP_MAGIC_ITEM_DRAGONGUARD', $elementsAfterRestrictions);
        $this->assertArrayNotHasKey('ID_WOTC_LMOP_MAGIC_ITEM_HEW', $elementsAfterRestrictions);
        $this->assertArrayNotHasKey('ID_WOTC_LMOP_MAGIC_ITEM_LIGHTBRINGER', $elementsAfterRestrictions);
        $this->assertArrayNotHasKey('ID_WOTC_LMOP_MAGIC_ITEM_STAFF_OF_DEFENSE', $elementsAfterRestrictions);
        $this->assertArrayNotHasKey('ID_WOTC_LMOP_MAGIC_ITEM_SPIDER_STAFF', $elementsAfterRestrictions);

        $this->assertNotSameSize($elements, $elementsAfterRestrictions);

        $difference = array_diff_key($elements, $elementsAfterRestrictions);
        $this->assertNotSameSize($difference, $elements);
        $this->assertNotSameSize($difference, $elementsAfterRestrictions);

        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_DRAGONGUARD', $difference);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_HEW', $difference);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_LIGHTBRINGER', $difference);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_STAFF_OF_DEFENSE', $difference);
        $this->assertArrayHasKey('ID_WOTC_LMOP_MAGIC_ITEM_SPIDER_STAFF', $difference);

        $this->assertCount(count($elements) - count($elementsAfterRestrictions), $difference);
    }

    final public function testGetElementsFromIndexDirectoryPlayTestSourceElementsRestricted(): void
    {
        $sourceRestrictions = $this->sourcesManager->restrictPlayTestSourceElements();

        $this->elementsProvider->setRestrictions();
        $elements = $this->elementsProvider->getElementsFromIndexDirectory();

        $restrictedElements = $sourceRestrictions->restricted->elements;
        foreach ($restrictedElements as $restrictedElement) {
            $this->assertArrayHasKey($restrictedElement->value, $elements);
        }

        $this->elementsProvider->setRestrictions($sourceRestrictions->restricted);
        $elementsAfterRestrictions = $this->elementsProvider->getElementsFromIndexDirectory();

        foreach ($restrictedElements as $restrictedElement) {
            $this->assertArrayNotHasKey($restrictedElement->value, $elementsAfterRestrictions);
        }

        $this->assertNotSameSize($elements, $elementsAfterRestrictions);

        $difference = array_diff_key($elements, $elementsAfterRestrictions);
        $this->assertNotSameSize($difference, $elements);
        $this->assertNotSameSize($difference, $elementsAfterRestrictions);

        foreach ($restrictedElements as $restrictedElement) {
            $this->assertArrayHasKey($restrictedElement->value, $elements);
        }

        $this->assertCount(count($elements) - count($elementsAfterRestrictions), $difference);
    }
}