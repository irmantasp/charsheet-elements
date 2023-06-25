<?php

namespace App\Model\Elements\Elements\Element;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("multiclass")
 */
class MulticlassModel
{

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $prerequisite;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $requirements;

    /**
     * @var RulesModel
     *
     * @Serializer\Type("App\Model\Elements\Elements\Element\RulesModel")
     */
    public RulesModel $rules;

    /**
     * @var SettersModel
     *
     * @Serializer\Type("App\Model\Elements\Elements\Element\SettersModel")
     */
    public SettersModel $setters;
}