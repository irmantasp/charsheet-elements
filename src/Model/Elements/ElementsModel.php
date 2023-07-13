<?php

namespace App\Model\Elements;

use App\Model\Elements\Elements\AppendModel;
use App\Model\Elements\Elements\ElementModel;
use App\Model\Elements\Elements\InfoModel;
use App\Property\FileInterface;
use App\Property\FileInterfaceTrait;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("elements")
 */
class ElementsModel implements FileInterface
{
    use FileInterfaceTrait;

    /**
     * @var InfoModel
     *
     * @Serializer\Type("App\Model\Elements\Elements\InfoModel")
     */
    public InfoModel $info;

    /**
     * @var ElementModel[]
     *
     * @Serializer\Type("array<App\Model\Elements\Elements\ElementModel>")
     * @Serializer\XmlList(inline=true, entry="element")
     */
    public array $elements;

    /**
     * @var AppendModel[]
     *
     * @Serializer\Type("array<App\Model\Elements\Elements\AppendModel>")
     * @Serializer\XmlList(inline=true, entry="append")
     */
    public array $append;
}