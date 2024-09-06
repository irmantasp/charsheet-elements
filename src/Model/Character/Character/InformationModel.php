<?php

namespace App\Model\Character\Character;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('information')]
class InformationModel
{

    /**
     * @var string
     */
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('group')]
    public string $group;

    /**
     * @var int
     */
    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('generationOption')]
    public int $generationOption;
}