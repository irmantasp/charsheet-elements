<?php

namespace App\Model\Character\Character\Build\Input;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('currency')]
class CurrencyModel
{
    #[Serializer\Type('integer')]
    public int $copper;

    #[Serializer\Type('integer')]
    public int $silver;

    #[Serializer\Type('integer')]
    public int $electrum;

    #[Serializer\Type('integer')]
    public int $gold;

    #[Serializer\Type('integer')]
    public int $platinum;

    #[Serializer\Type('string')]
    public string $equipment;

    #[Serializer\Type('string')]
    public string $treasure;
}
