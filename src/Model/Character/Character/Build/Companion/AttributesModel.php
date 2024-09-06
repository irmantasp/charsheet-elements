<?php

namespace App\Model\Character\Character\Build\Companion;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('attributes')]
class AttributesModel
{
    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('strength')]
    public int $strength;

    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('dexterity')]
    public int $dexterity;

    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('constitution')]
    public int $constitution;

    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('intelligence')]
    public int $intelligence;

    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('wisdom')]
    public int $wisdom;

    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('charisma')]
    public int $charisma;
}
