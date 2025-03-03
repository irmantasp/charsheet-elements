<?php

namespace App\Model\Character\Character\Build\Input\Notes;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('note')]
class NoteModel
{
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('column')]
    #[Serializer\XmlAttribute]
    public string $column;

    #[Serializer\Type('string')]
    #[Serializer\XmlValue(cdata: false)]
    public string $value;
}
