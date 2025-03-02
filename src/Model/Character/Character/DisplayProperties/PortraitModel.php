<?php

namespace App\Model\Character\Character\DisplayProperties;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('portrait')]
class PortraitModel
{
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('companion')]
    #[Serializer\SkipWhenEmpty]
    public ?string $companion;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('local')]
    #[Serializer\SkipWhenEmpty]
    public ?string $local;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('base64')]
    #[Serializer\SkipWhenEmpty]
    public ?string $base64;
}
