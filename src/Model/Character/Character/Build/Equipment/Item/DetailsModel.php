<?php

namespace App\Model\Character\Character\Build\Equipment\Item;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('details')]
class DetailsModel
{
    #[Serializer\XmlAttribute]
    public bool $card;

    #[Serializer\SkipWhenEmpty]
    public ?string $name;

    #[Serializer\SkipWhenEmpty]
    public ?string $notes;
}
