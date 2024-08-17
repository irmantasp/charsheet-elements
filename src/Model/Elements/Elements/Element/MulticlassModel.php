<?php

namespace App\Model\Elements\Elements\Element;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("multiclass")]
class MulticlassModel
{

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $id;

    /**
     * @var string
     */
    public string $prerequisite;

    /**
     * @var string
     */
    public string $requirements;

    /**
     * @var RulesModel
     */
    #[Serializer\Type(RulesModel::class)]
    public RulesModel $rules;

    /**
     * @var SettersModel
     */
    #[Serializer\Type(SettersModel::class)]
    public SettersModel $setters;
}