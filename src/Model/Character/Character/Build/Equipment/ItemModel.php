<?php

namespace App\Model\Character\Character\Build\Equipment;

use App\Model\Character\Character\Build\Equipment\Item\DetailsModel;
use App\Model\Character\Character\Build\Equipment\Item\EquippedModel;
use App\Model\Character\Character\Build\Equipment\Item\ItemsModel;
use App\Model\Character\Character\Build\Equipment\Item\StorageModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("item")
 */
class ItemModel
{

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $identifier;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $id;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     */
    public int $amount;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     */
    public bool $sidebar;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     */
    public bool $hidden;

    /**
     * @var EquippedModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Equipment\Item\EquippedModel")
     * @Serializer\SkipWhenEmpty()
     */
    public ?EquippedModel $equipped;

    /**
     * @var bool|null
     *
     * @Serializer\Type("bool")
     * @Serializer\SkipWhenEmpty()
     */
    public ?bool $attunement;

    /**
     * @var ItemsModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Equipment\Item\ItemsModel")
     * @Serializer\SkipWhenEmpty()
     */
    public ?ItemsModel $items;

    /**
     * @var DetailsModel
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Equipment\Item\DetailsModel")
     */
    public DetailsModel $details;

    /**
     * @var StorageModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\Equipment\Item\StorageModel")
     */
    public ?StorageModel $storage;
}