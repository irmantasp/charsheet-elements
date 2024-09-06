<?php

namespace App\Model\Index\Index\Info\Update;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('file')]
class FileModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $url;

    final public function getName(): string
    {
        return $this->name;
    }

    final public function setName(string $name): FileModel
    {
        $this->name = $name;

        return $this;
    }

    final public function getUrl(): string
    {
        return $this->url;
    }

    final public function setUrl(string $url): FileModel
    {
        $this->url = $url;

        return $this;
    }
}
