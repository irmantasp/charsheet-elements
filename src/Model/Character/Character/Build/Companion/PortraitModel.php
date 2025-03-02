<?php

namespace App\Model\Character\Character\Build\Companion;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('portrait')]
class PortraitModel
{
    #[Serializer\XmlAttribute]
    public string $location;

    #[Serializer\XmlValue]
    public string $value;
}
