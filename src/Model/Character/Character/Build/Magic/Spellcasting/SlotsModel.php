<?php

namespace App\Model\Character\Character\Build\Magic\Spellcasting;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("slots")
 */
class SlotsModel
{

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s1;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s2;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s3;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s4;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s5;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s6;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s7;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s8;

    /**
     * @var int
     *
     * @Serializer\XmlAttribute()
     * @Serializer\Type("integer")
     */
    public int $s9;
}