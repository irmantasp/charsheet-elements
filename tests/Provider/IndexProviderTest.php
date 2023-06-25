<?php

namespace App\Tests\Provider;

use App\Provider\IndexProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class IndexProviderTest extends KernelTestCase
{

    private IndexProvider $indexProvider;
    final protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->indexProvider = $container->get(IndexProvider::class);
    }

    final public function testGetFromUrl(): void
    {
        $url = 'https://raw.githubusercontent.com/AuroraLegacy/elements/master/core.index';
        $result = $this->indexProvider->getFromUrl($url);

        return;
    }
}