<?php

namespace App\Model\Character\Character\Build\Magic;

use JMS\Serializer\Annotation as Serializer;

abstract class SpellCollectionModel
{
    /**
     * @var SpellModel[]
     */
    #[Serializer\Type('array<'.SpellModel::class.'>')]
    #[Serializer\XmlList(entry: 'spell', inline: true)]
    public array $spells;
}
