<?php

namespace App\Model\Rule;

use App\Model\Rule;
use JMS\Serializer\Annotation as Serializer;

class Stat extends Rule
{
    /**
     * @Serializer\XmlAttribute
     */
    public string $name;

    /**
     * @Serializer\XmlAttribute
     */
    public string $value;

    /**
     * @Serializer\XmlAttribute
     */
    public string $alt;

    /**
     * @Serializer\XmlAttribute
     */
    public string $bonus;

    /**
     * @Serializer\XmlAttribute
     */
    public int $level;

    /**
     * @Serializer\XmlAttribute
     */
    public string $requirements;
}