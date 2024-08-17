<?php

namespace App\Model\Elements\Elements;

use App\Model\Elements\Elements\Element\RulesModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("append")]
class AppendModel
{
    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $id;

    /**
     * @var RulesModel
     */
    #[Serializer\Type(RulesModel::class)]
    public RulesModel $rules;

    /**
     * @var string|null
     */
    #[Serializer\SkipWhenEmpty]
    public ?string $supports = null;
}