<?php

namespace App\Model\Rule;

use App\Model\Rule;
use JMS\Serializer\Annotation as Serializer;

class Select extends Rule
{

    /**
     * @Serializer\XmlAttribute
     */
    public string $type;

    /**
     * @Serializer\XmlAttribute
     */
    public string $name;

    /**
     * @Serializer\XmlAttribute
     */
    public string $supports;

    /**
     * @Serializer\XmlAttribute
     */
    public int $number;

    /**
     * @Serializer\XmlAttribute
     */
    public string $spellcasting;

    /**
     * @Serializer\XmlAttribute
     */
    public string $requirements;

    /**
     * @Serializer\XmlAttribute
     */
    public bool $optional;

    /**
     * @Serializer\XmlAttribute
     */
    public int $level;
}