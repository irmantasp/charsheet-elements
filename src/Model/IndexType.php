<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("elements")
 */
class IndexType
{
    /**
     * @Serializer\Type("App\Model\Info")
     *
     * @var Info
     */
    public Info $info;

    /**
     * @Serializer\Type("array<App\Model\Element>")
     * @Serializer\XmlList(inline=true, entry="element")
     *
     * @var Element[]
     */
    public array $elements;
}