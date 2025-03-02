<?php

namespace App\Model\Elements\Elements\Info;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('name')]
class NameModel
{
    #[Serializer\XmlValue]
    public string $value;

    #[Serializer\XmlAttribute]
    public string $url;
}
