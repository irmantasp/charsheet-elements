<?php

namespace App\Model\Elements\Elements\Element\Setters;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('set')]
class SetterModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $currency;

    #[Serializer\XmlAttribute]
    public string $addition;

    #[Serializer\XmlAttribute]
    public string $lb;

    #[Serializer\XmlAttribute]
    public string $type;

    #[Serializer\XmlAttribute]
    public bool $excludeEncumbrance;

    #[Serializer\XmlAttribute]
    public bool $weightless;

    #[Serializer\XmlAttribute]
    public string $abbreviation;

    #[Serializer\XmlAttribute]
    public string $url;

    #[Serializer\XmlAttribute]
    public int $bulk;

    #[Serializer\XmlAttribute]
    public string $modifier;

    #[Serializer\XmlAttribute]
    public bool $override;

    #[Serializer\XmlValue]
    public string $value;
}
