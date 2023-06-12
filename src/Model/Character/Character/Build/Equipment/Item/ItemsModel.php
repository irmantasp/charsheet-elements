<?php

namespace App\Model\Character\Character\Build\Equipment\Item;

use App\Model\Character\Character\Build\Equipment\Item\Items\AdornerModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("items")
 */
class ItemsModel
{

    /**
     * @var AdornerModel
     *
     * @Serializer\Type(" App\Model\Character\Character\Build\Equipment\Item\Items\AdornerModel")
     */
    public AdornerModel $adorner;
}