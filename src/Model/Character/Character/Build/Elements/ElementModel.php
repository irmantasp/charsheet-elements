<?php

namespace App\Model\Character\Character\Build\Elements;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('element')]
class ElementModel
{
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('type')]
    #[Serializer\XmlAttribute]
    public string $type;

    #[Serializer\SerializedName('name')]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\SerializedName('id')]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $id;

    #[Serializer\SerializedName('rndhp')]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $randomHitPoints;

    #[Serializer\SerializedName('multiclass')]
    #[Serializer\Type('bool')]
    #[Serializer\XmlAttribute]
    public bool $multiclass;

    #[Serializer\SerializedName('starting')]
    #[Serializer\Type('bool')]
    #[Serializer\XmlAttribute]
    public bool $starting;

    #[Serializer\SerializedName('class')]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $class;

    #[Serializer\SerializedName('requiredLevel')]
    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $requiredLevel;

    #[Serializer\SerializedName('checksum')]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $checksum;

    #[Serializer\SerializedName('registered')]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    public string $registered;

    #[Serializer\SerializedName('number')]
    #[Serializer\Type('integer')]
    #[Serializer\XmlAttribute]
    public int $number;

    #[Serializer\SerializedName('isList')]
    #[Serializer\Type('bool')]
    #[Serializer\XmlAttribute]
    public bool $isList;

    /**
     * @var ElementModel[]
     */
    #[Serializer\Type('array<'.ElementModel::class.'>')]
    #[Serializer\XmlList(entry: 'element', inline: true)]
    #[Serializer\SkipWhenEmpty]
    public array $elements;
}
