<?php

namespace App\Model\Index\Elements\Element\Spellcasting;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("extend")
 */
class ExtendModel
{
    /**
     * @var string
     *
     * @Serializer\XmlValue()
     */
    public string $value;
}