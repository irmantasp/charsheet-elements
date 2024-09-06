<?php

namespace App\Model\Character\Character\Build\Companion\Skills;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('skill')]
class SkillModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlValue]
    public int $value;
}
