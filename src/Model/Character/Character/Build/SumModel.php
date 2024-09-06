<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Sum\ElementModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('sum')]
class SumModel
{
    #[Serializer\SerializedName('element-count')]
    #[Serializer\XmlAttribute]
    public int $elementCount;

    /**
     * @var ElementModel[]
     */
    #[Serializer\Type('array<'.ElementModel::class.'>')]
    #[Serializer\XmlList(entry: 'element', inline: true)]
    public array $elements;
}
