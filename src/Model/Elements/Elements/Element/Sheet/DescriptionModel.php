<?php

namespace App\Model\Elements\Elements\Element\Sheet;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('description')]
class DescriptionModel
{
    #[Serializer\XmlAttribute]
    public int $level;

    #[Serializer\XmlAttribute]
    public string $usage;

    #[Serializer\XmlAttribute]
    public string $value;
}
