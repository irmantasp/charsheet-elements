<?php

namespace App\Provider;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\PruneableInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\Cache\ItemInterface;

abstract class AbstractElementsDataProvider
{
    private IndexDataProvider $indexDataProvider;
    public PruneableInterface $cache;
    public SluggerInterface $slug;

    public function __construct(IndexDataProvider $indexDataProvider)
    {
        $this->indexDataProvider = $indexDataProvider;
        $this->cache = new FilesystemAdapter();
        $this->slug = new AsciiSlugger();
    }

    abstract public function getElements(): array;

    final public function getElementsByType(?string $type = null): array
    {
        return $this->cache->get($this->getCacheKey(['list', $type]), function (ItemInterface $item) use ($type) {
            $item->expiresAfter(30*24*60*60);

            [$info, $elements, $appends] = $this->indexDataProvider->getIndexes();

            if (is_null($type)) {
                return $elements;
            }

            return $this->getByType($type, $elements);
        });
    }

    private function getByType(string $type, array $elements): array {
        return array_filter($elements, static function ($element) use ($type) {
            return $element->type === $type;
        });
    }

    final public function getCacheKey(array $arguments): string
    {
        if (empty($arguments)) {
            throw new \RuntimeException('Arguments list for cache key generation cannot be empty.');
        }

        return $this->slug->slug(implode('-', $arguments));
    }
}