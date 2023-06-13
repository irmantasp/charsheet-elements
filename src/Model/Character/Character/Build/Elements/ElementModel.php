<?php

namespace App\Model\Character\Character\Build\Elements;


use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("element")
 */
class ElementModel
{
    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     */
    public string $type;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("name")
     * @Serializer\Type("string")
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("id")
     * @Serializer\Type("string")
     */
    public string $id;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("rndhp")
     * @Serializer\Type("string")
     */
    public string $randomHitPoints;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("multiclass")
     * @Serializer\Type("bool")
     */
    public bool $multiclass;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("starting")
     * @Serializer\Type("bool")
     */
    public bool $starting;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("class")
     * @Serializer\Type("string")
     */
    public string $class;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("requiredLevel")
     * @Serializer\Type("integer")
     */
    public int $requiredLevel;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("checksum")
     * @Serializer\Type("string")
     */
    public string $checksum;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("registered")
     * @Serializer\Type("string")
     */
    public string $registered;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("number")
     * @Serializer\Type("integer")
     */
    public int $number;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("isList")
     * @Serializer\Type("bool")
     */
    public bool $isList;

    /**
     * @var ElementModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Elements\ElementModel>")
     * @Serializer\XmlList(inline=true, entry="element")
     * @Serializer\SkipWhenEmpty()
     */
    public array $elements;
}