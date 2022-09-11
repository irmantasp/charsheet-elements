<?php

namespace App\Model\Index\Elements\Info;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("author")
 */
class AuthorModel
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