<?php

namespace App\Model\Index\Index\Info;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('author')]
class AuthorModel
{
    #[Serializer\XmlValue]
    #[Serializer\XmlElement(cdata: false)]
    public string $value;

    #[Serializer\XmlAttribute]
    public string $url;

    final public function getValue(): string
    {
        return $this->value;
    }

    final public function setValue(string $value): AuthorModel
    {
        $this->value = $value;

        return $this;
    }

    final public function getUrl(): string
    {
        return $this->url;
    }

    final public function setUrl(string $url): AuthorModel
    {
        $this->url = $url;

        return $this;
    }
}
