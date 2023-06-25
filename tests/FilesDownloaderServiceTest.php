<?php

namespace App\Tests;

use App\FilesDownloaderService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FilesDownloaderServiceTest extends KernelTestCase
{
    private FilesDownloaderService $filesDownloader;
    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->filesDownloader = $container->get(FilesDownloaderService::class);
    }

    /**
     * @dataProvider provideTestGetFromUrlData
     */
    final public function testPersist(string $url): void
    {
        $this->filesDownloader->persist($url);
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