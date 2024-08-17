<?php

namespace App\Model\Elements\Elements\Element\Setters;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("set")]
class SetterModel
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
    public string $currency;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $addition;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $lb;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $type;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $excludeEncumbrance;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $weightless;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $abbreviation;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $url;

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $bulk;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $modifier;

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $override;

    /**
     * @var string
     */
    #[Serializer\XmlValue]
    public string $value;
}