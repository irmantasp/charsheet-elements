<?php

namespace App\Model\Index\Elements;

use App\Model\Index\Elements\Element\RulesModel;
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
     * @Serializer\Type("App\Model\Index\Elements\Element\RulesModel")
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