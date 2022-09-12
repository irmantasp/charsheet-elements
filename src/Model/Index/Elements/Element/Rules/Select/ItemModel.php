<?php

namespace App\Model\Index\Elements\Element\Rules\Select;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("item")
 */
class ItemModel
{
    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     */
    public int $id;

    /**
     * @var string
     *
     * @Serializer\XmlValue()
     */
    public string $value;
}