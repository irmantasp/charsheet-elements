<?php

namespace App\Model\Character\Character\Build\Input\Background;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("feature")
 */
class FeatureModel
{
    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     */
    public string $description;
}