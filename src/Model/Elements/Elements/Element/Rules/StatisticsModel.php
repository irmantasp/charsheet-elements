<?php

namespace App\Model\Elements\Elements\Element\Rules;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("stat")]
class StatisticsModel extends RuleModel
{

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $value;

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $level;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $bonus;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $alt;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $requirements;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $equipped;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $inline;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $base;

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $maximum;

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $max;
}