<?php

namespace App\Model\Character\Character\DisplayProperties;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("portrait")
 */
class PortraitModel
{

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("companion")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $companion;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("local")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $local;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("base64")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $base64;
}