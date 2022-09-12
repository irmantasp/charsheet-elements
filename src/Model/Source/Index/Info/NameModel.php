<?php

namespace App\Model\Source\Index\Info;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("name")
 */
class NameModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlValue()
     */
    public string $value;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $url;

    /**
     * @return string
     */
    final public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return NameModel
     */
    final public function setValue(string $value): NameModel
    {
        $this->value = $value;
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
     * @return NameModel
     */
    final public function setUrl(string $url): NameModel
    {
        $this->url = $url;
        return $this;
    }
}