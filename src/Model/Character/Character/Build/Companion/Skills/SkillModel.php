<?php

namespace App\Model\Character\Character\Build\Companion\Skills;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('skill')]
class SkillModel
{

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var int
     */
    #[Serializer\XmlValue]
    public int $value;
}