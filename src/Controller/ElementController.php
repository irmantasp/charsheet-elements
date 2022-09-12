<?php

namespace App\Controller;

use App\Model\Index\ElementsModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElementController extends AbstractSerializerController
{

    /**
     * @Route("/elements", name="elements_list")
     */
    final public function list(): Response {
        $this->setWorkingDir('index');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('xml'));
        /** @var ElementsModel[] $indexes */
        $indexes = array_map(function ($content) {
            return $this->deserialize($content, ElementsModel::class, 'xml');
        }, $files);

        $elements = [];
        foreach ($indexes as $index) {
            if (!empty($index->elements)) {
                array_push($elements, ...$index->elements);
            }
        }

        $elementsWithProperty = array_filter($elements, static function ($element) {
            return isset($element->rules) && !empty($element->rules);
        });

        $element = array_filter($elements, static function ($element) {
           return $element->id === 'ID_RACIAL_TRAIT_DROW_MAGIC';
        });

        return $this->renderPlaceholder($elements);
    }
}