<?php

namespace App\Model\Index\Index\Info\Update;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("file")
 */
class FileModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $name;

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
    final public function setName(string $name): FileModel
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
    final public function setUrl(string $url): FileModel
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $url;
}