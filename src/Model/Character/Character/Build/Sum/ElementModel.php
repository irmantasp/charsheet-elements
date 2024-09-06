<?php

namespace App\Model\Character\Character\Build\Sum;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('element')]
class ElementModel
{
    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $type;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $id;

}