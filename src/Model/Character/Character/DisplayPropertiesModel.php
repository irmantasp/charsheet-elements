<?php

namespace App\Model\Character\Character;

use App\Model\Character\Character\DisplayProperties\PortraitModel;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[Serializer\XmlRoot('display-properties')]
class DisplayPropertiesModel
{
    #[Serializer\XmlAttribute]
    #[Serializer\Type('bool')]
    #[SerializedName('favorite')]
    public bool $favorite;

    #[Serializer\Type('string')]
    #[SerializedName('name')]
    #[Serializer\SkipWhenEmpty]
    public ?string $name;

    #[Serializer\Type('string')]
    #[SerializedName('race')]
    #[Serializer\SkipWhenEmpty]
    public ?string $race;

    #[Serializer\Type('string')]
    #[SerializedName('class')]
    #[Serializer\SkipWhenEmpty]
    public ?string $class;

    #[Serializer\Type('string')]
    #[SerializedName('archetype')]
    #[Serializer\SkipWhenEmpty]
    public ?string $archetype;

    #[Serializer\Type('string')]
    #[SerializedName('background')]
    #[Serializer\SkipWhenEmpty]
    public ?string $background;

    #[Serializer\Type('int')]
    #[SerializedName('level')]
    #[Serializer\SkipWhenEmpty]
    public ?int $level;

    #[Serializer\Type(PortraitModel::class)]
    #[SerializedName('portrait')]
    #[Serializer\SkipWhenEmpty]
    public ?PortraitModel $portrait;
}
