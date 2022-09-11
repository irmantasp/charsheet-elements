<?php

namespace App\Model\Source\Index\Info;

use JMS\Serializer\Annotation as Serializer;

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