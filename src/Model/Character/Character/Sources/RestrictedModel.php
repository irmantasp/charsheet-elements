<?php

namespace App\Model\Character\Character\Sources;

use App\Model\Character\Character\Sources\Restricted\ElementModel;
use App\Model\Character\Character\Sources\Restricted\SourceModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("restricted")
 */
class RestrictedModel
{

    /**
     * @var SourceModel[]|null
     *
     * @Serializer\XmlList(entry="source", inline=true)
     * @Serializer\Type("array<App\Model\Character\Character\Sources\Restricted\SourceModel>")
     * @Serializer\SkipWhenEmpty()
     */
    public ?array $sources;

    /**
     * @var ElementModel[]|null
     *
     * @Serializer\XmlList(entry="element", inline=true)
     * @Serializer\Type("array<App\Model\Character\Character\Sources\Restricted\ElementModel>")
     * @Serializer\SkipWhenEmpty()
     */
    public ?array $elements;

}