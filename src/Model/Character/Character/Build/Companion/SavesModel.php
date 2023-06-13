<?php

namespace App\Model\Character\Character\Build\Companion;

use App\Model\Character\Character\Build\Companion\Saves\SaveModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("saves")
 */
class SavesModel
{

    /**
     * @var SaveModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Companion\Saves\SaveModel>")
     * @Serializer\XmlList(inline=true, entry="save")
     */
    public array $saves;
}