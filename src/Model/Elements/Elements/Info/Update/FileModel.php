<?php

namespace App\Model\Elements\Elements\Info\Update;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("file")]
class FileModel
{

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $url;
}