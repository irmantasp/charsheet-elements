<?php

namespace App\Model\Source\Index\Info;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("author")
 */
class AuthorModel
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
     * @return AuthorModel
     */
    final public function setValue(string $value): AuthorModel
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
     * @return AuthorModel
     */
    final public function setUrl(string $url): AuthorModel
    {
        $this->url = $url;
        return $this;
    }

}