<?php

namespace App\Model\Elements\Elements\Element\Rules;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('stat')]
class StatisticsModel extends RuleModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $value;

    #[Serializer\XmlAttribute]
    public int $level;

    #[Serializer\XmlAttribute]
    public string $bonus;

    #[Serializer\XmlAttribute]
    public string $alt;

    #[Serializer\XmlAttribute]
    public string $requirements;

    #[Serializer\XmlAttribute]
    public string $equipped;

    #[Serializer\XmlAttribute]
    public bool $inline;

    #[Serializer\XmlAttribute]
    public string $base;

    #[Serializer\XmlAttribute]
    public int $maximum;

    #[Serializer\XmlAttribute]
    public int $max;
}
