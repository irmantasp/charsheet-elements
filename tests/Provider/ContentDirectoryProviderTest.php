<?php

namespace App\Tests\Provider;

use App\Provider\ContentDirectoryProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContentDirectoryProviderTest extends KernelTestCase
{
    private ContentDirectoryProvider $contentDirectoryProvider;

    private string $indexDirectory;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->contentDirectoryProvider = $container->get(ContentDirectoryProvider::class);
        $this->indexDirectory = $container->getParameter('app.dir.index');
    }

    #[DataProvider('provideTestGetFromUrlData')]
    final public function testPersist(string $url): void
    {
        $result = $this->contentDirectoryProvider->persist($url);

        $this->assertDirectoryExists($this->indexDirectory);
        $this->assertFileExists($result);
        $this->assertEquals(file_get_contents($url), file_get_contents($result));
    }

    final public static function provideTestGetFromUrlData(): array
    {
        return [
            'Core' => ['https://raw.githubusercontent.com/AuroraLegacy/elements/master/core.index'],
            'Supplements' => ['https://raw.githubusercontent.com/AuroraLegacy/elements/master/supplements.index'],
            'Unearthed Arcana' => ['https://raw.githubusercontent.com/AuroraLegacy/elements/master/unearthed-arcana.index'],
            'Third Party' => ['https://raw.githubusercontent.com/aurorabuilder/elements/master/third-party.index'],
            'D&D Wiki' => ['https://raw.githubusercontent.com/community-elements/elements-dndwiki/master/dndwiki.index'],
            'Reddit' => ['https://raw.githubusercontent.com/community-elements/elements-reddit/master/reddit.index'],
        ];
    }

}