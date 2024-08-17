<?php

namespace App\Model\Elements\Elements\Info;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("author")]
class AuthorModel
{

    /**
     * @var string
     */
    #[Serializer\XmlValue]
    public string $value;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $url;
}