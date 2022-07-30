<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class File
{

    /**
     * @Serializer\XmlAttribute
     */
    public string $name;

    /**
     * @Serializer\XmlAttribute
     */
    public string $url;
}