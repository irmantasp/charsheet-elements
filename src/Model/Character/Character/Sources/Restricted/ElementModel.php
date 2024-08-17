<?php

namespace App\Model\Character\Character\Sources\Restricted;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("element")]
class ElementModel
{

    /**
     * @var string
     */
    #[Serializer\XmlValue(cdata: false)]
    public string $value;
}