<?php

namespace App\Model\Index\Elements\Element;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("compendium")
 */
class CompendiumModel
{

    /**
     * @var bool
     *
     * @Serializer\Type("bool")
     * @Serializer\XmlAttribute()
     */
    public bool $display;
}