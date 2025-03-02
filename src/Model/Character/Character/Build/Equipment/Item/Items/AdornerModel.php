<?php

namespace App\Model\Character\Character\Build\Equipment\Item\Items;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('adorner')]
class AdornerModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $id;
}
