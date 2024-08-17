<?php

namespace App\Provider;

use App\Helper\SerializerHelperTrait;
use App\Model\Elements\Elements\ElementModel;
use App\Model\Elements\ElementsModel;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\PruneableInterface;
use Symfony\Contracts\Cache\ItemInterface;

class ContentElementsProvider
{

    use SerializerHelperTrait;

    private SerializerInterface $serializer;

    private string $indexDirectory;

    private PruneableInterface $cache;

    private LoggerInterface $logger;

    public function __construct(
        SerializerInterface $serializer,
        string $indexDirectory,
        LoggerInterface $logger,
    )
    {
        $this->serializer = $serializer;
        $this->indexDirectory = $indexDirectory;
        $this->cache = new FilesystemAdapter('elements');
        $this->logger = $logger;

    }

    final public function getElementsFromIndexDirectory(): array
    {
        return $this->cache->get('elements', function (ItemInterface $item): array {
            $item->expiresAfter(365 * 24 * 60 * 60);

            $indexTree = new \RecursiveTreeIterator(new \RecursiveDirectoryIterator($this->indexDirectory, \FilesystemIterator::SKIP_DOTS));
            $elements = [];
            foreach ($indexTree as $entry => $value) {
                if (str_contains($entry, '.xml') === false) {
                    continue;
                }

                $content = file_get_contents($entry);
                if ($content === false) {
                    continue;
                }

                try {
                    /** @var ElementsModel $elementsModel */
                    $elementsModel = $this->deserialize($content, ElementsModel::class, 'xml');
                    $elementsModelElements = $elementsModel->elements;
                    if (!empty($elementsModelElements)) {
                        foreach ($elementsModelElements as $element) {
                            $element->__parent = $elementsModel;
                            $elements[$element->id] = $element;
                        }
                    }
                }
                catch (\Throwable $throwable) {
                    $this->logger->error($throwable->getMessage());
                    continue;
                }
            }

            return $elements;
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