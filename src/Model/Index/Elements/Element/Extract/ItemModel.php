<?php

namespace App\Model\Index\Elements\Element\Extract;

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
    public int $amount;

    /**
     * @var string
     *
     * @Serializer\XmlValue()
     */
    public string $value;
}