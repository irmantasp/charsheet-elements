<?php

namespace App\Model\Character\Character\Build\Input\Attacks;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('attack')]
class AttackModel
{
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('identifier')]
    #[Serializer\XmlAttribute]
    public string $identifier;

    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $range;

    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $attack;

    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $damage;

    #[Serializer\Type('bool')]
    #[Serializer\XmlAttribute]
    public bool $displayed;

    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $ability;

    public string $description;
}
