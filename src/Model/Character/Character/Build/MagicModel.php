<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Magic\AdditionalModel;
use App\Model\Character\Character\Build\Magic\SpellcastingModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('magic')]
class MagicModel
{

    /**
     * @var bool
     *
     * @Serializer\Type("bool")
     */
    #[Serializer\XmlAttribute]
    public bool $multiclass;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $level;

    /**
     * @var SpellcastingModel[]
     */
    #[Serializer\Type('array<' . SpellcastingModel::class . '>')]
    #[Serializer\XmlList(entry: 'spellcasting', inline: true)]
    #[Serializer\SkipWhenEmpty]
    public array $spellcasting;

    /**
     * @var AdditionalModel|null
     */
    #[Serializer\Type(AdditionalModel::class)]
    #[Serializer\SkipWhenEmpty]
    public ?AdditionalModel $additional;
}