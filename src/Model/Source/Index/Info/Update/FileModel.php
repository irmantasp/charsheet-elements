<?php

namespace App\Model\Source\Index\Info\Update;

use JMS\Serializer\Annotation as Serializer;

class FileModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $url;
}