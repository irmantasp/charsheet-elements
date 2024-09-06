<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Equipment\ItemModel;
use App\Model\Character\Character\Build\Equipment\StorageModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('equipment')]
class EquipmentModel
{
    /**
     * @var StorageModel[]
     */
    #[Serializer\Type('array<' . StorageModel::class . '>')]
    #[Serializer\XmlList(entry: 'storage', inline: true)]
    public array $storage;

    /**
     * @var ItemModel[]
     */
    #[Serializer\Type('array<' . ItemModel::class . '>')]
    #[Serializer\XmlList(entry: 'item', inline: true)]
    public array $items;
}