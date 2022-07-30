<?php

namespace App\Model\Rule;

use App\Model\Rule;
use JMS\Serializer\Annotation as Serializer;

class Grant extends Rule
{
    /**
     * @Serializer\XmlAttribute
     */
    public string $type;

    /**
     * @Serializer\XmlAttribute
     */
    public string $id;

    /**
     * @Serializer\XmlAttribute
     */
    public int $level;

    /**
     * @Serializer\XmlAttribute
     */
    public string $spellcasting;

    /**
     * @Serializer\XmlAttribute
     */
    public bool $prepared;

    /**
     * @Serializer\XmlAttribute
     */
    public string $requirements;
}