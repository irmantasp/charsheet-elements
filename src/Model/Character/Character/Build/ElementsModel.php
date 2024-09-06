<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Elements\ElementModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('elements')]
class ElementsModel
{
    /**
     * @var int
     *
     * @Serializer\SerializedName("level-count")
     */
    #[Serializer\XmlAttribute]
    public int $levelCount;

    /**
     * @var int
     *
     * @Serializer\SerializedName("registered-count")
     */
    #[Serializer\XmlAttribute]
    public int $registeredCount;

    /**
     * @var array
     */
    #[Serializer\Type('array<' . ElementModel::class . '>')]
    #[Serializer\XmlList(entry: 'element', inline: true)]
    public array $elements;
}