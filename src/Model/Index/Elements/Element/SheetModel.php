<?php

namespace App\Model\Index\Elements\Element;

use App\Model\Index\Elements\Element\Sheet\DescriptionModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("sheet")
 */
class SheetModel
{

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     */
    public bool $display;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $alt;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $usage;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $action;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var DescriptionModel[]
     *
     * @Serializer\Type("array<App\Model\Index\Elements\Element\Sheet\DescriptionModel>")
     * @Serializer\XmlList(inline=true, entry="description")
     */
    public array $description;
}