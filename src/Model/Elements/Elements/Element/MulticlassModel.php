<?php

namespace App\Model\Elements\Elements\Element;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('multiclass')]
class MulticlassModel
{
    #[Serializer\XmlAttribute]
    public string $id;

    public string $prerequisite;

    public string $requirements;

    #[Serializer\Type(RulesModel::class)]
    public RulesModel $rules;

    #[Serializer\Type(SettersModel::class)]
    public SettersModel $setters;
}
