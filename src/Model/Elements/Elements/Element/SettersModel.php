<?php

namespace App\Model\Elements\Elements\Element;

use App\Model\Elements\Elements\Element\Setters\SetterModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("setters")]
class SettersModel
{

    /**
     * @var SetterModel[]
     */
    #[Serializer\Type("array<" . SetterModel::class . ">")]
    #[Serializer\XmlList(entry: "set", inline: true)]
    public array $setters;
}