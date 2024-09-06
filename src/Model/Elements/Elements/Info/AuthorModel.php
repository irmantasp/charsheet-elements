<?php

namespace App\Model\Elements\Elements\Info;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('author')]
class AuthorModel
{
    #[Serializer\XmlValue]
    public string $value;

    #[Serializer\XmlAttribute]
    public string $url;
}
