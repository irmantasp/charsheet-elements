<?php

namespace App\Model\Character\Character\Build;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("appearance")
 */
class AppearanceModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("portrait")
     */
    public string $portrait;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("age")
     */
    public string $age;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("height")
     */
    public string $height;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("weight")
     */
    public string $weight;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("eyes")
     */
    public string $eyes;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("skin")
     */
    public string $skin;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("hair")
     */
    public string $hair;
}