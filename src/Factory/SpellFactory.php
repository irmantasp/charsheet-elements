<?php

namespace App\Factory;

use App\Entity\Spell;
use App\Model\Elements\Elements\Element\SettersModel;
use App\Model\Elements\Elements\ElementModel;

class SpellFactory
{

    public static function createFromModel(ElementModel $model): Spell
    {
        if ($model->type !== 'Spell') {
            throw new \RuntimeException('Invalid model type.');
        }

        $spell = new Spell();

        $spell->__element = $model;

        $spell->id = $model->id;
        $spell->name = $model->name;
        $spell->source = $model->source;
        $spell->description = $model->description;

        if (property_exists($model, 'setter') && $model->setter instanceof SettersModel) {
            $setters = $model->setter->setters;
            foreach ($setters as $setter) {
                if (property_exists($spell, $setter->name)) {
                    $property = $setter->name;
                    $spell->$property = $setter->value;
                }
            }
        }

        if (property_exists($model, 'setters') && $model->setters instanceof SettersModel) {
            $setters = $model->setters->setters;
            foreach ($setters as $setter) {
                if (property_exists($spell, $setter->name)) {
                    $property = $setter->name;
                    $spell->$property = $setter->value;
                }
            }
        }

        return $spell;
    }
}