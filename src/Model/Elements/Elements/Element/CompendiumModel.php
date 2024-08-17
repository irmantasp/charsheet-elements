<?php

namespace App\Model\Elements\Elements\Element;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("compendium")]
class CompendiumModel
{

    /**
     * @var bool
     */
    #[Serializer\XmlAttribute]
    public bool $display;
}