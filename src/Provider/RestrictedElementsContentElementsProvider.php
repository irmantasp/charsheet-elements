<?php

namespace App\Provider;

use App\Model\Character\Character\Sources\RestrictedModel;
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


    final public function getElementsFromIndexDirectory(): array
    {
        if ($this->getRestrictions() === null) {
            return $this->elementsProvider->getElementsFromIndexDirectory();
        }

        return $this->cache->get('elements_after_source_restrictions_applied', function (ItemInterface $item): array {
            $item->expiresAfter(365 * 24 * 60 * 60);

            $elements = $this->elementsProvider->getElementsFromIndexDirectory();

            if ($this->getRestrictions() === null) {
                return $elements;
            }

            foreach ($this->restrictions->sources as $sourceRestriction) {
                $restrictedSourceElements = $this->elementsProvider->getElementsBySource($sourceRestriction->value);
                $elements = array_diff_key($elements, $restrictedSourceElements);
            }

            foreach ($this->restrictions->elements as $elementRestriction) {
                $restrictedElements = $this->elementsProvider->getElementsById($elementRestriction->value);
                $elements = array_diff_key($elements, $restrictedElements);
            }


            return $elements;
        });
    }


}