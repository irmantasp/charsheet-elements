<?php

namespace App\Model\Elements;

use App\Model\Elements\Elements\AppendModel;
use App\Model\Elements\Elements\ElementModel;
use App\Model\Elements\Elements\InfoModel;
use App\Property\FileInterface;
use App\Property\FileInterfaceTrait;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('elements')]
class ElementsModel implements FileInterface
{
    use FileInterfaceTrait;

    #[Serializer\Type(InfoModel::class)]
    public InfoModel $info;

    /**
     * @var ElementModel[]
     */
    #[Serializer\Type('array<'.ElementModel::class.'>')]
    #[Serializer\XmlList(entry: 'element', inline: true)]
    public array $elements;

    #[Serializer\Type('array<'.AppendModel::class.'>')]
    #[Serializer\XmlList(inline: true, entry: 'append')]
    public array $append;
}
