<?php

namespace App\Model\Elements\Elements\Element;

use App\Model\Elements\Elements\Element\Spellcasting\ExtendModel;
use App\Model\Elements\Elements\Element\Spellcasting\ListModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('spellcasting')]
class SpellcastingModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $ability;

    #[Serializer\XmlAttribute]
    public bool $prepare;

    #[Serializer\XmlAttribute]
    public bool $allowReplace;

    #[Serializer\XmlAttribute]
    public bool $extend;

    #[Serializer\XmlAttribute]
    public bool $all;

    /**
     * @var ExtendModel[]
     */
    #[Serializer\SerializedName('extend')]
    #[Serializer\XmlList(entry: 'extend', inline: true)]
    #[Serializer\Type('array<'.ExtendModel::class.'>')]
    public array $extends;

    #[Serializer\Type(ListModel::class)]
    public ListModel $list;
}
