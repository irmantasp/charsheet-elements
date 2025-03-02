<?php

namespace App\Model\Elements\Elements\Element;

use App\Model\Elements\Elements\Element\Sheet\DescriptionModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('sheet')]
class SheetModel
{
    #[Serializer\XmlAttribute]
    public bool $display;

    #[Serializer\XmlAttribute]
    public string $alt;

    #[Serializer\XmlAttribute]
    public string $usage;

    #[Serializer\XmlAttribute]
    public string $action;

    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var DescriptionModel[]
     */
    #[Serializer\Type('array<'.DescriptionModel::class.'>')]
    #[Serializer\XmlList(entry: 'description', inline: true)]
    public array $description;
}
