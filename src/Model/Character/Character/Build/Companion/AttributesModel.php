<?php

namespace App\Model\Character\Character\Build\Companion;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('attributes')]
class AttributesModel
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("strength")
     */
    public int $strength;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("dexterity")
     */
    public int $dexterity;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("constitution")
     */
    public int $constitution;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("intelligence")
     */
    public int $intelligence;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("wisdom")
     */
    public int $wisdom;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("charisma")
     */
    public int $charisma;

}