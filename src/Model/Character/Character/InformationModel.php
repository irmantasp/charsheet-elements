<?php

namespace App\Model\Character\Character;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('information')]
class InformationModel
{
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('group')]
    public string $group;

    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('generationOption')]
    public int $generationOption;
}
