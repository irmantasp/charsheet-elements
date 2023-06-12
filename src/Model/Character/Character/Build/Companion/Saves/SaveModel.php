<?php

namespace App\Model\Character\Character\Build\Companion\Saves;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("save")
 */
class SaveModel
{
    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $ability;

    /**
     * @var int
     *
     * @Serializer\XmlValue()
     */
    public int $value;

}