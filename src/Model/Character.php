<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("character")
 */
class Character
{

    /**
     * @Serializer\XmlAttribute
     */
    public string $version;

    /**
     * @Serializer\XmlAttribute
     */
    public bool $preview;

    /**
     * @Serializer\Type("App\Model\Information")
     */
    public Information $information;

    /**
     * @Serializer\SerializedName("display-properties")
     * @Serializer\Type("App\Model\DisplayProperties")
     */
    public DisplayProperties $displayProperties;

    /**
     * @Serializer\Type("App\Model\Build")
     */
    public Build $build;

    /**
     * @Serializer\Type("App\Model\Sources")
     */
    public Sources $sources;
}