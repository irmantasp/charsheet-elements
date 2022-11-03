<?php

namespace App\Provider;

use App\Model\Index\ElementsModel;
use Symfony\Contracts\Cache\ItemInterface;

class IndexDataProvider extends AbstractSerializedDataProvider
{

    final public function getIndexes(): array
    {
        return $this->cache->get($this->getCacheKey(['indexes']), function(ItemInterface $item)
        {
            $files = $this->getFiles('index', 'xml');
            $indexes = $this->getContent($files, ElementsModel::class, 'xml');

            return $this->splitData($indexes);
        });
    }

    final public function splitData(array $indexes): array {
        $info = $elements = $appends = $data = [];
        foreach ($indexes as $index) {
            if (isset($index->info)) {
                $info[] = $index->info;
            }
            if (!empty($index->elements)) {
                array_push($elements, ...$index->elements);
            }
            if (!empty($index->append)) {
                array_push($appends, ...$index->append);
            }
        }

        $data['info'] = $info;
        foreach ($elements as $element) {
            $data['elements'][$element->id] = $element;
        }
        foreach ($appends as $append) {
            $data['appends'][$append->id] = $append;
        }

        return array_values($data);
    }
}