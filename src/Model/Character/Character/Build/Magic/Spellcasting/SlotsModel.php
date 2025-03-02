<?php

namespace App\Model\Character\Character\Build\Magic\Spellcasting;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('slots')]
class SlotsModel
{
    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s1;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s2;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s3;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s4;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s5;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s6;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s7;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s8;

    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $s9;
}
