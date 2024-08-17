<?php

namespace App\Model\Elements\Elements\Element;

use App\Model\Elements\Elements\Element\Rules\RuleModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("rules")]
class RulesModel
{

    /**
     * @var RuleModel[]
     */
    #[Serializer\Type("array<". RuleModel::class . ">")]
    #[Serializer\XmlList(entry: "grant|stat|select", inline: true)]
    public array $rules;
}