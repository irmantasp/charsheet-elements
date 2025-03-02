<?php

namespace App\Manager;

use App\Model\Character\Character\Sources\Restricted\SourceModel;
use App\Model\Character\Character\Sources\RestrictedModel;
use App\Model\Character\Character\SourcesModel;
use App\Model\Elements\Elements\ElementModel;
use App\Provider\ContentElementsProvider;

class SourcesManager
{
    private ContentElementsProvider $contentElementsProvider;

    public function __construct(ContentElementsProvider $contentElementsProvider)
    {
        $this->contentElementsProvider = $contentElementsProvider;
    }

    final public function restrictSourceElements(string $sourceName): SourcesModel
    {
        $sources = $this->contentElementsProvider->getElementsByType('Source');
        $sources = array_filter($sources, static function (ElementModel $source) use ($sourceName) {
            return $source->name === $sourceName;
        });

        if (1 !== count($sources)) {
            throw new \RuntimeException('No source found.');
        }

        $source = reset($sources);

        $characterSourcesRestrictedSource = new SourceModel();
        $characterSourcesRestrictedSource->id = $source->id;
        $characterSourcesRestrictedSource->value = $source->name;

        $elements = $this->contentElementsProvider->getElementsBySource($source->name);

        $characterSourcesRestrictedElements = [];
        foreach ($elements as $element) {
            $characterSourcesRestrictedElement = new \App\Model\Character\Character\Sources\Restricted\ElementModel();
            $characterSourcesRestrictedElement->value = $element->id;
            $characterSourcesRestrictedElements[] = $characterSourcesRestrictedElement;
        }

        $characterSourcesRestricted = new RestrictedModel();
        $characterSourcesRestricted->sources[] = $characterSourcesRestrictedSource;
        $characterSourcesRestricted->elements = $characterSourcesRestrictedElements;

        $characterSources = new SourcesModel();
        $characterSources->restricted = $characterSourcesRestricted;

        return $characterSources;
    }

    final public function restrictPlayTestSourceElements(): SourcesModel
    {
        $sources = $this->contentElementsProvider->getElementsByType('Source');
        $sources = array_filter($sources, static function (ElementModel $source) {
            $setters = $source->setters;
            foreach ($setters->setters as $setter) {
                if ('playtest' === $setter->name && 'true' === $setter->value) {
                    return true;
                }
            }

            return false;
        });

        if (0 === count($sources)) {
            throw new \RuntimeException('No playtest sources found.');
        }

        $restricted = new RestrictedModel();

        foreach ($sources as $source) {
            $restrictedSource = new SourceModel();
            $restrictedSource->id = $source->id;
            $restrictedSource->value = $source->name;

            $restricted->sources[] = $restrictedSource;

            $elements = $this->contentElementsProvider->getElementsBySource($source->name);

            foreach ($elements as $element) {
                $restrictedElement = new \App\Model\Character\Character\Sources\Restricted\ElementModel();
                $restrictedElement->value = $element->id;

                $restricted->elements[] = $restrictedElement;
            }
        }

        $restrictedSources = new SourcesModel();
        $restrictedSources->restricted = $restricted;

        return $restrictedSources;
    }
}
