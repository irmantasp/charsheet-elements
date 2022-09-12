<?php

namespace App\Model\Index\Elements\Element;

use App\Model\Index\Elements\Element\Setters\SetterModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("setters")
 */
class SettersModel
{

    /**
     * @var SetterModel[]
     *
     * @Serializer\Type("array<App\Model\Index\Elements\Element\Setters\SetterModel>")
     * @Serializer\XmlList(inline=true, entry="set")
     */
    public array $setters;
}