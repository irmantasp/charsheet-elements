<?php

namespace App\Model\Index\Index\File;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('obsolete')]
class ObsoleteModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $url;

    final public function getName(): string
    {
        return $this->name;
    }

    final public function setName(string $name): ObsoleteModel
    {
        $this->name = $name;

        return $this;
    }

    final public function getUrl(): string
    {
        return $this->url;
    }

    final public function setUrl(string $url): ObsoleteModel
    {
        $this->url = $url;

        return $this;
    }
}
