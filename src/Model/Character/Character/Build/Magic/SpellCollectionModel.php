<?php

namespace App\Model\Character\Character\Build\Magic;

use JMS\Serializer\Annotation as Serializer;

/**
 *
 */
abstract class SpellCollectionModel
{

    /**
     * @var SpellModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Magic\SpellModel>")
     * @Serializer\XmlList(inline=true, entry="spell")
     */
    public array $spells;
}