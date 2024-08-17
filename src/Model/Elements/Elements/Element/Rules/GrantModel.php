<?php

namespace App\Model\Elements\Elements\Element\Rules;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("select")]
class GrantModel extends RuleModel
{

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $type;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $id;

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $level;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $spellcasting;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $prepared;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $requirements;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $equipped;
}