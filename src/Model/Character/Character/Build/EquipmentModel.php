<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Equipment\ItemModel;
use App\Model\Character\Character\Build\Equipment\StorageModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("equipment")
 */
class EquipmentModel
{
    /**
     * @var StorageModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Equipment\StorageModel>")
     * @Serializer\XmlList(inline=true, entry="storage")
     */
    public array $storage;

    /**
     * @var ItemModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Equipment\ItemModel>")
     * @Serializer\XmlList(inline=true, entry="item")
     */
    public array $items;
}