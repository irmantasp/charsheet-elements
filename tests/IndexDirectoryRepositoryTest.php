<?php

namespace App\Tests;

use App\Repository\IndexDirectoryRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class IndexDirectoryRepositoryTest extends KernelTestCase
{
    private IndexDirectoryRepository $indexDirectory;
    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->indexDirectory = $container->get(IndexDirectoryRepository::class);
    }

    /**
     * @dataProvider provideTestGetFromUrlData
     */
    final public function testPersist(string $url): void
    {
        $this->indexDirectory->persist($url);
    }

    final public function provideTestGetFromUrlData(): array
    {
        return [
            'Core' => ['https://raw.githubusercontent.com/AuroraLegacy/elements/master/core.index'],
            'Supplements' => ['https://raw.githubusercontent.com/AuroraLegacy/elements/master/supplements.index'],
            'Unearthed Arcana' => ['https://raw.githubusercontent.com/AuroraLegacy/elements/master/unearthed-arcana.index'],
        ];
    }

}