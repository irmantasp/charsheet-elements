<?php

namespace App\Model\Elements\Elements;

use App\Model\Elements\Elements\Element\RulesModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("append")
 */
class AppendModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $id;

    /**
     * @var RulesModel
     *
     * @Serializer\Type("App\Model\Elements\Elements\Element\RulesModel")
     */
    public RulesModel $rules;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty()
     */
    public string $supports;
}