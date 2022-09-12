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
        $info = $elements = $appends = [];

        $files = $this->getFiles('index', 'xml');
        $indexes = $this->getContent($files, ElementsModel::class, 'xml');

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

        $races = $this->getByType('Race', $elements);
        $classes = $this->getByType('Class', $elements);
        $feats = $this->getByType('Feat', $elements);
        $backgrounds = $this->getByType('Background', $elements);
        $items = $this->getByType('Item', $elements);
        $spells = $this->getByType('Spell', $elements);

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

    private function getByType(string $type, array $elements): array {
        return array_filter($elements, static function ($element) use ($type) {
            return $element->type === $type;
        });
    }

}