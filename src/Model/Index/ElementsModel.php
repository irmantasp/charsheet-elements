<?php

namespace App\Model\Index;

use App\Model\Index\Elements\AppendModel;
use App\Model\Index\Elements\ElementModel;
use App\Model\Index\Elements\InfoModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("elements")
 */
class ElementsModel
{

    /**
     * @var InfoModel
     *
     * @Serializer\Type("App\Model\Index\Elements\InfoModel")
     */
    public InfoModel $info;

    /**
     * @var ElementModel[]
     *
     * @Serializer\Type("array<App\Model\Index\Elements\ElementModel>")
     * @Serializer\XmlList(inline=true, entry="element")
     */
    public array $elements;

    /**
     * @var AppendModel[]
     *
     * @Serializer\Type("array<App\Model\Index\Elements\AppendModel>")
     * @Serializer\XmlList(inline=true, entry="append")
     */
    public array $append;
}