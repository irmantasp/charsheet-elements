<?php

namespace App\Model\Character\Character\Build;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("elements")
 */
class ElementsModel
{
    /**
     * @var int
     *
     * @Serializer\SerializedName("level-count")
     * @Serializer\XmlAttribute()
     */
    public int $levelCount;

    /**
     * @var int
     *
     * @Serializer\SerializedName("registered-count")
     * @Serializer\XmlAttribute()
     */
    public int $registeredCount;

    /**
     * @var array
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Elements\ElementModel>")
     * @Serializer\XmlList(inline=true, entry="element")
     */
    public array $elements;
}