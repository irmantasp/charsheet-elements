<?php

namespace App\Model\Character\Character\Build\Input\Attacks;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("attack")
 */
class AttackModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("identifier")
     * @Serializer\XmlAttribute()
     */
    public string $identifier;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $range;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $attack;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $damage;

    /**
     * @var bool
     *
     * @Serializer\Type("bool")
     * @Serializer\XmlAttribute()
     */
    public bool $displayed;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $ability;

    /**
     * @var string
     */
    public string $description;
}