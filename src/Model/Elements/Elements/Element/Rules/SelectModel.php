<?php

namespace App\Model\Elements\Elements\Element\Rules;

use App\Model\Elements\Elements\Element\Rules\Select\ItemModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('select')]
class SelectModel extends RuleModel
{
    #[Serializer\XmlAttribute]
    public string $type;

    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $supports;

    #[Serializer\XmlAttribute]
    public string $spellcasting;

    #[Serializer\XmlAttribute]
    public string $requirements;

    #[Serializer\XmlAttribute]
    public int $number;

    #[Serializer\XmlAttribute]
    public bool $optional;

    #[Serializer\XmlAttribute]
    public int $level;

    #[Serializer\XmlAttribute]
    public string $default;

    #[Serializer\XmlAttribute]
    public string $defaultBehaviour;

    #[Serializer\XmlAttribute]
    public bool $prepared;

    #[Serializer\XmlAttribute]
    public bool $allowReplace;

    /**
     * @var ItemModel[]
     */
    #[Serializer\Type('array<'.ItemModel::class.'>')]
    #[Serializer\XmlList(entry: 'item', inline: true)]
    public array $items;
}
