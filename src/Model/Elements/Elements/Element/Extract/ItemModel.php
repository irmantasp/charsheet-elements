<?php

namespace App\Model\Elements\Elements\Element\Extract;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('item')]
class ItemModel
{
    #[Serializer\XmlAttribute]
    public int $amount;

    #[Serializer\XmlValue]
    public string $value;
}
