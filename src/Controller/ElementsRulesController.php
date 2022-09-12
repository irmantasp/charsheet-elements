<?php

namespace App\Controller;

use App\Model\Index\Elements\Element\Rules\SelectModel;
use App\Model\Index\ElementsModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElementsRulesController extends AbstractSerializerController
{

    /**
     * @Route("/elements/rules", name="elements_rules_list")
     */
    final public function list(): Response {
        $this->setWorkingDir('index');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('xml'));
        /** @var ElementsModel[] $indexes */
        $indexes = array_map(function ($content) {
            return $this->deserialize($content, ElementsModel::class, 'xml');
        }, $files);

        $rules = [];
        foreach ($indexes as $index) {
            if (empty($index->elements)) {
                continue;
            }

            $elements = $index->elements;
            foreach ($elements as $element) {
                if (empty($element->rules->rules)) {
                    continue;
                }

                array_push($rules, ...$element->rules->rules);
            }
        }

        $rulesOfType = array_filter($rules, static function ($rule) {
            return $rule instanceof SelectModel && !empty($rule->name) && $rule->name === 'Personality Trait';
        });

        return $this->renderPlaceholder($rules);
    }
}