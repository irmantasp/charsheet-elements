<?php

namespace App\Model\Character\Character\Build\Equipment\Item;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("storage")
 */
#[Serializer\XmlRoot('storage')]
class StorageModel
{

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    #[Serializer\SkipWhenEmpty]
    public ?string $location;
}