<?php

namespace App\Model\Source\Index\File;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("obsolete")
 */
class ObsoleteModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $url;

    /**
     * @return string
     */
    final public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return FileModel
     */
    final public function setName(string $name): ObsoleteModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    final public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return FileModel
     */
    final public function setUrl(string $url): ObsoleteModel
    {
        $this->url = $url;
        return $this;
    }
}