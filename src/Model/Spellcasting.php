<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Spellcasting
{

    /**
     * @Serializer\XmlAttribute
     */
    public string $name;

    /**
     * @Serializer\XmlAttribute
     */
    public bool $extend;

    /**
     * @Serializer\XmlAttribute
     */
    public string $ability;

    /**
     * @Serializer\XmlAttribute
     */
    public bool $allowReplace;

    /**
     * @Serializer\XmlAttribute
     */
    public bool $prepare;

    /**
     * @Serializer\XmlAttribute
     */
    public bool $all;

    /**
     * @Serializer\Type("array<App\Model\Extend>")
     * @Serializer\XmlList(inline=true, entry="extend")
     * @Serializer\SkipWhenEmpty
     */
    public array $extends;

}