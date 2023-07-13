<?php

namespace App\Provider;

use App\Model\Character\Character\Sources\RestrictedModel;
use App\Model\Elements\Elements\ElementModel;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\PruneableInterface;
use Symfony\Contracts\Cache\ItemInterface;

class RestrictedElementsContentElementsProvider
{
    private ContentElementsProvider $elementsProvider;

    private PruneableInterface $cache;

    private ?RestrictedModel $restrictions = null;

    public function __construct(ContentElementsProvider $contentElementsProvider)
    {
        $this->elementsProvider = $contentElementsProvider;
        $this->cache = new FilesystemAdapter('elements');
    }

    final public function setRestrictions(?RestrictedModel $restrictions = null): void
    {
        if ($this->restrictions !== $restrictions) {
            $this->cache->delete('elements_after_source_restrictions_applied');
        }

        $this->restrictions = $restrictions;
    }

    final public function getRestrictions(): ?RestrictedModel
    {
        return $this->restrictions;
    }

    private function restrict(array $elements): array
    {
        if ($this->getRestrictions() === null) {
            return $elements;
        }

        foreach ($this->restrictions->sources as $sourceRestriction) {
            $restrictedSourceElements = $this->elementsProvider->getElementsBySource($sourceRestriction->value);
            $elements = array_diff_key($elements, $restrictedSourceElements);
        }

        return $elements;
    }


    final public function getElementsFromIndexDirectory(): array
    {
        if ($this->getRestrictions() === null) {
            return $this->elementsProvider->getElementsFromIndexDirectory();
        }

        return $this->cache->get('elements_after_source_restrictions_applied', function (ItemInterface $item): array {
            $item->expiresAfter(365 * 24 * 60 * 60);

            $elements = $this->elementsProvider->getElementsFromIndexDirectory();

            return  $this->restrict($elements);
        });
    }


    final public function getElementsByType(string $type): array
    {
        $elements = $this->getElementsFromIndexDirectory();

        return array_filter($elements, static function (ElementModel $element) use ($type) {
            return $element->type === $type;
        });
    }

    final public function getElementsBySource(string $source): array
    {
        $elements = $this->getElementsFromIndexDirectory();

        return array_filter($elements, static function (ElementModel $element) use ($source) {
            return $element->source === $source;
        });
    }

    final public function getElementsById(string $id): array
    {
        $elements = $this->getElementsFromIndexDirectory();

        return array_filter($elements, static function (ElementModel $element) use ($id) {
            return $element->id === $id;
        });
    }

    final public function getElementsByName(string $name): array
    {
        $elements = $this->getElementsFromIndexDirectory();

        return array_filter($elements, static function (ElementModel $element) use ($name) {
            return str_contains($element->name, $name);
        });
    }

    final public function getElementsByDescription(string $description): array
    {
        $elements = $this->getElementsFromIndexDirectory();

        return array_filter($elements, static function (ElementModel $element) use ($description) {
            return str_contains($element->description, $description);
        });
    }


}