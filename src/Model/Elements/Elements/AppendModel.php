<?php

namespace App\Model\Elements\Elements;

use App\Model\Elements\Elements\Element\RulesModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('append')]
class AppendModel
{
    #[Serializer\XmlAttribute]
    public string $id;

    #[Serializer\Type(RulesModel::class)]
    public RulesModel $rules;

    #[Serializer\SkipWhenEmpty]
    public ?string $supports = null;
}
