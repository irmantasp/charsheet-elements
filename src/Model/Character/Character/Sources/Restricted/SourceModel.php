<?php

namespace App\Model\Character\Character\Sources\Restricted;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('source')]
class SourceModel
{
    #[Serializer\XmlAttribute]
    public string $id;

    #[Serializer\XmlValue(cdata: false)]
    public string $value;
}
