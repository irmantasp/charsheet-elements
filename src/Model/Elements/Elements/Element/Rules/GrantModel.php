<?php

namespace App\Model\Elements\Elements\Element\Rules;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('select')]
class GrantModel extends RuleModel
{
    #[Serializer\XmlAttribute]
    public string $type;

    #[Serializer\XmlAttribute]
    public string $id;

    #[Serializer\XmlAttribute]
    public int $level;

    #[Serializer\XmlAttribute]
    public string $spellcasting;

    #[Serializer\XmlAttribute]
    public bool $prepared;

    #[Serializer\XmlAttribute]
    public string $requirements;

    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $equipped;
}
