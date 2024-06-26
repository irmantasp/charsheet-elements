<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Sum\ElementModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("sum")
 */
class SumModel
{

    /**
     * @var int
     *
     * @Serializer\SerializedName("element-count")
     * @Serializer\XmlAttribute()
     */
    public int $elementCount;

    /**
     * @var ElementModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Sum\ElementModel>")
     * @Serializer\XmlList(inline=true, entry="element")
     */
    public array $elements;
}