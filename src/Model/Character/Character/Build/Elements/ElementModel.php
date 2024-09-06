<?php

namespace App\Model\Character\Character\Build\Elements;


use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('element')]
class ElementModel
{
    /**
     * @var string
     *
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     */
    #[Serializer\XmlAttribute]
    public string $type;

    /**
     * @var string
     *
     * @Serializer\SerializedName("name")
     * @Serializer\Type("string")
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var string
     *
     * @Serializer\SerializedName("id")
     * @Serializer\Type("string")
     */
    #[Serializer\XmlAttribute]
    public string $id;

    /**
     * @var string
     *
     * @Serializer\SerializedName("rndhp")
     * @Serializer\Type("string")
     */
    #[Serializer\XmlAttribute]
    public string $randomHitPoints;

    /**
     * @var bool
     *
     * @Serializer\SerializedName("multiclass")
     * @Serializer\Type("bool")
     */
    #[Serializer\XmlAttribute]
    public bool $multiclass;

    /**
     * @var bool
     *
     * @Serializer\SerializedName("starting")
     * @Serializer\Type("bool")
     */
    #[Serializer\XmlAttribute]
    public bool $starting;

    /**
     * @var string
     *
     * @Serializer\SerializedName("class")
     * @Serializer\Type("string")
     */
    #[Serializer\XmlAttribute]
    public string $class;

    /**
     * @var int
     *
     * @Serializer\SerializedName("requiredLevel")
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $requiredLevel;

    /**
     * @var string
     *
     * @Serializer\SerializedName("checksum")
     * @Serializer\Type("string")
     */
    #[Serializer\XmlAttribute]
    public string $checksum;

    /**
     * @var string
     *
     * @Serializer\SerializedName("registered")
     * @Serializer\Type("string")
     */
    #[Serializer\XmlAttribute]
    public string $registered;

    /**
     * @var int
     *
     * @Serializer\SerializedName("number")
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $number;

    /**
     * @var bool
     *
     * @Serializer\SerializedName("isList")
     * @Serializer\Type("bool")
     */
    #[Serializer\XmlAttribute]
    public bool $isList;

    /**
     * @var ElementModel[]
     */
    #[Serializer\Type('array<' . ElementModel::class . '>')]
    #[Serializer\XmlList(entry: 'element', inline: true)]
    #[Serializer\SkipWhenEmpty]
    public array $elements;
}