<?php

namespace App\Model\Elements\Elements\Element\Sheet;


use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("description")]
class DescriptionModel
{

    /**
     * @var int
     */
    #[Serializer\XmlAttribute]
    public int $level;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $usage;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $value;
}