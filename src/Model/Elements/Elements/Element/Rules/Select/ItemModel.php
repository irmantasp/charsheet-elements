<?php

namespace App\Model\Elements\Elements\Element\Rules\Select;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('item')]
class ItemModel
{
    #[Serializer\XmlAttribute]
    public int $id;

    #[Serializer\XmlValue]
    public string $value;
}
