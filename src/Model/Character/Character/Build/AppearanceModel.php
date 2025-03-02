<?php

namespace App\Model\Character\Character\Build;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('appearance')]
class AppearanceModel
{
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('portrait')]
    public string $portrait;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('age')]
    public string $age;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('height')]
    public string $height;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('weight')]
    public string $weight;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('eyes')]
    public string $eyes;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('skin')]
    public string $skin;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('hair')]
    public string $hair;
}
