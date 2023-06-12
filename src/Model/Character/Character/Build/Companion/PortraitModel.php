<?php

namespace App\Model\Character\Character\Build\Companion;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("portrait")
 */
class PortraitModel
{

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $location;

    /**
     * @var string
     */
    public string $value;
}