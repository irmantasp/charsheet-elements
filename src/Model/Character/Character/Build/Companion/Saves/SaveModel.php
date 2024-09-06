<?php

namespace App\Model\Character\Character\Build\Companion\Saves;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('save')]
class SaveModel
{
    #[Serializer\XmlAttribute]
    public string $ability;

    #[Serializer\XmlValue]
    public int $value;
}
