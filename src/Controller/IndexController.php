<?php

namespace App\Controller;

use App\Model\Index\ElementsModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractSerializerController
{
    /**
     * @Route("/indexes", name="index_list")
     */
    final public function list(): Response
    {
        $files = $this->getFiles('index', 'xml');
        $indexes = $this->getContent($files, ElementsModel::class, 'xml');
        [$info, $elements, $appends] = $this->splitData($indexes);
        $types = ['Race', 'Class', 'Feat', 'Background', 'Item', 'Spell', 'Source'];
        [$races, $classes, $feats, $backgrounds, $items, $spells] = $this->splitByType($types, $elements);

        return $this->renderPlaceholder(
            $indexes,
            $info,
            $elements,
            $appends,
            $races,
            $classes,
            $feats,
            $backgrounds,
            $items,
            $spells
        );
    }

    private function splitData(array $indexes): array {
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

    private function splitByType(array $types, array $elements): array {
        return array_map(function ($type) use ($elements) {
            return $this->getByType($type, $elements);
        }, $types);
    }

    private function getByType(string $type, array $elements): array {
        return array_filter($elements, static function ($element) use ($type) {
            return $element->type === $type;
        });
    }

}