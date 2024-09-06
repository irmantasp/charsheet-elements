<?php

namespace App\Model\Character\Character\Build\Equipment\Item;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('storage')]
class StorageModel
{
    #[Serializer\Type('string')]
    #[Serializer\SkipWhenEmpty]
    public ?string $location;
}
