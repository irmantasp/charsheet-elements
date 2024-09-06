<?php

namespace App\Model\Character\Character\Build\Magic;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('spell')]
class SpellModel
{
    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $level;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $id;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    #[Serializer\XmlAttribute]
    public bool $prepared;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("always-prepared")
     */
    #[Serializer\XmlAttribute]
    public bool $alwaysPrepared;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    #[Serializer\XmlAttribute]
    public bool $known;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $source;

}