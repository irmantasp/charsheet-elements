<?php

namespace App\Model\Elements\Elements\Info\Update;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('file')]
class FileModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $url;
}
