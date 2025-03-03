<?php

namespace App\Model\Character\Character\Sources\Restricted;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('element')]
class ElementModel
{
    #[Serializer\XmlValue(cdata: false)]
    public string $value;
}
