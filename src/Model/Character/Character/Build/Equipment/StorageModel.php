<?php

namespace App\Model\Character\Character\Build\Equipment;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("storage")
 */
class StorageModel
{

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $name;
}