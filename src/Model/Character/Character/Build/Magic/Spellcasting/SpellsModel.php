<?php

namespace App\Model\Character\Character\Build\Magic\Spellcasting;

use App\Model\Character\Character\Build\Magic\SpellCollectionModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('spells')]
class SpellsModel extends SpellCollectionModel
{
}
