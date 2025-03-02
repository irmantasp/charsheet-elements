<?php

namespace App\Model\Character\Character\Build\Magic;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('spell')]
class SpellModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $level;

    #[Serializer\XmlAttribute]
    public string $id;

    #[Serializer\Type('bool')]
    #[Serializer\XmlAttribute]
    public bool $prepared;

    #[Serializer\Type('bool')]
    #[Serializer\SerializedName('always-prepared')]
    #[Serializer\XmlAttribute]
    public bool $alwaysPrepared;

    #[Serializer\Type('bool')]
    #[Serializer\XmlAttribute]
    public bool $known;

    #[Serializer\XmlAttribute]
    public string $source;
}
