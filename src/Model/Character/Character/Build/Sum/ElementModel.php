<?php

namespace App\Model\Character\Character\Build\Sum;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('element')]
class ElementModel
{
    #[Serializer\XmlAttribute]
    public string $type;

    #[Serializer\XmlAttribute]
    public string $id;
}
