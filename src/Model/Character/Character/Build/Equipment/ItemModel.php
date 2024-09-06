<?php

namespace App\Model\Character\Character\Build\Equipment;

use App\Model\Character\Character\Build\Equipment\Item\DetailsModel;
use App\Model\Character\Character\Build\Equipment\Item\EquippedModel;
use App\Model\Character\Character\Build\Equipment\Item\ItemsModel;
use App\Model\Character\Character\Build\Equipment\Item\StorageModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('item')]
class ItemModel
{
    #[Serializer\XmlAttribute]
    public string $identifier;

    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $id;

    #[Serializer\XmlAttribute]
    public int $amount;

    #[Serializer\XmlAttribute]
    public bool $sidebar;

    #[Serializer\XmlAttribute]
    public bool $hidden;

    #[Serializer\Type(EquippedModel::class)]
    #[Serializer\SkipWhenEmpty]
    public ?EquippedModel $equipped;

    #[Serializer\Type('bool')]
    #[Serializer\SkipWhenEmpty]
    public ?bool $attunement;

    #[Serializer\Type(ItemsModel::class)]
    #[Serializer\SkipWhenEmpty]
    public ?ItemsModel $items;

    #[Serializer\Type(DetailsModel::class)]
    public DetailsModel $details;

    #[Serializer\Type(StorageModel::class)]
    public ?StorageModel $storage;
}
