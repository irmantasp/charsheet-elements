<?php

namespace App\Model\Character\Character\Build\Companion;

use App\Model\Character\Character\Build\Companion\Saves\SaveModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('saves')]
class SavesModel
{

    /**
     * @var SaveModel[]
     */
    #[Serializer\Type('array<' . SaveModel::class . '>')]
    #[Serializer\XmlList(entry: 'save', inline: true)]
    public array $saves;
}