<?php

namespace App\Model\Index\Elements\Element\Spellcasting;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("list")
 */
class ListModel
{
    /**
     * @var bool
     *
     * @Serializer\Type("bool")
     * @Serializer\XmlAttribute()
     */
    public bool $known;

    /**
     * @var string
     *
     * @Serializer\XmlValue()
     */
    public string $value;
}