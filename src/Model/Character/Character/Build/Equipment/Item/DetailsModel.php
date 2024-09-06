<?php

namespace App\Model\Character\Character\Build\Equipment\Item;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('details')]
class DetailsModel
{

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $card;

    /**
     * @var string|null
     */
    #[Serializer\SkipWhenEmpty]
    public ?string $name;

    /**
     * @var string|null
     */
    #[Serializer\SkipWhenEmpty]
    public ?string $notes;
}