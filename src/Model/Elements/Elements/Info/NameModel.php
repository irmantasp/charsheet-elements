<?php

namespace App\Model\Elements\Elements\Info;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("name")
 */
class NameModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlValue()
     */
    public string $value;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $url;
}