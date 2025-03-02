<?php

namespace App\Model\Character\Character\Build\Equipment\Item;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('equipped')]
class EquippedModel
{
    #[Serializer\XmlAttribute]
    public string $location;

    #[Serializer\XmlValue(cdata: false)]
    public bool $value;
}
