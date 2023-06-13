<?php

namespace App\Model\Character\Character\Build\Magic;

use App\Model\Character\Character\Build\Magic\Spellcasting\CantripsModel;
use App\Model\Character\Character\Build\Magic\Spellcasting\SlotsModel;
use App\Model\Character\Character\Build\Magic\Spellcasting\SpellsModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("spellcasting")
 */
class SpellcastingModel
{
    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $ability;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $attack;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $dc;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $source;

    /**
     * @var SlotsModel
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Magic\Spellcasting\SlotsModel")
     */
    public SlotsModel $slots;

    /**
     * @var CantripsModel
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Magic\Spellcasting\CantripsModel")
     */
    public CantripsModel $cantrips;

    /**
     * @var SpellsModel
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Magic\Spellcasting\SpellsModel")
     */
    public SpellsModel $spells;
}