<?php

namespace App\Model\Character\Character\Build\Equipment\Item;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("equipped")
 */
class EquippedModel
{

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $location;

    /**
     * @var bool
     *
     * @Serializer\XmlValue(cdata=false)
     */
    public bool $value;
}