<?php

namespace App\Model\Character\Character\Build\Magic;

use App\Model\Character\Character\Build\Magic\Spellcasting\CantripsModel;
use App\Model\Character\Character\Build\Magic\Spellcasting\SlotsModel;
use App\Model\Character\Character\Build\Magic\Spellcasting\SpellsModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('spellcasting')]
class SpellcastingModel
{
    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $ability;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $attack;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $dc;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $source;

    /**
     * @var SlotsModel
     */
    #[Serializer\Type(SlotsModel::class)]
    public SlotsModel $slots;

    /**
     * @var CantripsModel
     */
    #[Serializer\Type(CantripsModel::class)]
    public CantripsModel $cantrips;

    /**
     * @var SpellsModel
     */
    #[Serializer\Type(SpellsModel::class)]
    public SpellsModel $spells;
}