<?php

namespace App\Model\Elements\Elements\Element\Spellcasting;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('list')]
class ListModel
{
    #[Serializer\XmlAttribute]
    public bool $known;

    #[Serializer\XmlValue]
    public string $value;
}
