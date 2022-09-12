<?php

namespace App\Model\Index\Elements\Element;

use App\Model\Index\Elements\Element\Extract\ItemModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("extract")
 */
class ExtractModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $description;

    /**
     * @var ItemModel[]
     *
     * @Serializer\Type("array<App\Model\Index\Elements\Element\Extract\ItemModel>")
     * @Serializer\XmlList(inline=true, entry="item")
     */
    public array $items;
}