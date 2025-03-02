<?php

namespace App\Model\Character\Character\Build\Magic;

use App\Model\Character\Character\Build\Magic\Spellcasting\CantripsModel;
use App\Model\Character\Character\Build\Magic\Spellcasting\SlotsModel;
use App\Model\Character\Character\Build\Magic\Spellcasting\SpellsModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('spellcasting')]
class SpellcastingModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $ability;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $attack;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $dc;

    #[Serializer\XmlAttribute]
    public string $source;

    #[Serializer\Type(SlotsModel::class)]
    public SlotsModel $slots;

    #[Serializer\Type(CantripsModel::class)]
    public CantripsModel $cantrips;

    #[Serializer\Type(SpellsModel::class)]
    public SpellsModel $spells;
}
