<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Magic\AdditionalModel;
use App\Model\Character\Character\Build\Magic\SpellcastingModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("magic")
 */
class MagicModel
{

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("bool")
     */
    public bool $multiclass;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $level;

    /**
     * @var SpellcastingModel[]
     * @Serializer\Type("array<App\Model\Character\Character\Build\Magic\SpellcastingModel>")
     * @Serializer\XmlList(inline=true, entry="spellcasting")
     * @Serializer\SkipWhenEmpty()
     */
    public array $spellcasting;

    /**
     * @var AdditionalModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Magic\AdditionalModel")
     * @Serializer\SkipWhenEmpty()
     */
    public ?AdditionalModel $additional;
}