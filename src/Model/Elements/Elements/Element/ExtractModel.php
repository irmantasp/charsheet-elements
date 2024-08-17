<?php

namespace App\Model\Elements\Elements\Element;

use App\Model\Elements\Elements\Element\Extract\ItemModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("extract")]
class ExtractModel
{
    /**
     * @var string
     */
    public string $description;

    /**
     * @var ItemModel[]
     */
    #[Serializer\Type("array<" . ItemModel::class . ">")]
    #[Serializer\XmlList(entry: "item", inline: true)]
    public array $items;
}