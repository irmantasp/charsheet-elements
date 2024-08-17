<?php

namespace App\Model\Elements\Elements\Element\Rules;

use App\Model\Elements\Elements\Element\Rules\Select\ItemModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("select")]
class SelectModel extends RuleModel
{
    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $type;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $supports;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $spellcasting;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $requirements;

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $number;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $optional;

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $level;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $default;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $defaultBehaviour;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $prepared;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $allowReplace;

    /**
     * @var ItemModel[]
     */
    #[Serializer\Type("array<". ItemModel::class . ">")]
    #[Serializer\XmlList(entry: "item", inline: true)]
    public array $items;
}