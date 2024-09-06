<?php

namespace App\Model\Character\Character\Build\Magic\Spellcasting;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('slots')]
class SlotsModel
{

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s1;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s2;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s3;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s4;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s5;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s6;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s7;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s8;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    #[Serializer\XmlAttribute]
    public int $s9;
}