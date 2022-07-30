<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Update
{

    /**
     * @Serializer\XmlAttribute
     */
    public string $version;

    /**
     * @Serializer\Type("App\Model\File")
     */
    public File $file;
}