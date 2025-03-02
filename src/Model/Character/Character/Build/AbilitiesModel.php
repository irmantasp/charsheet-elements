<?php

namespace App\Model\Character\Character\Build;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('abilities')]
class AbilitiesModel
{
    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('available-points')]
    #[Serializer\XmlAttribute]
    #[Serializer\SkipWhenEmpty]
    public ?int $availablePoints;

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
