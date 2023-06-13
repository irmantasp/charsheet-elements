<?php

namespace App\Model\Character\Character\Sources\Restricted;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("source")
 */
class SourceModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     * @Serializer\XmlAttribute()
     */
    public string $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlValue(cdata=false)
     */
    public string $value;
}