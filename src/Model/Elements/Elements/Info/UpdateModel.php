<?php

namespace App\Model\Elements\Elements\Info;

use App\Model\Index\Index\Info\Update\FileModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('update')]
class UpdateModel
{
    #[Serializer\XmlAttribute]
    public string $version;

    /**
     * @var FileModel[]
     */
    #[Serializer\Type('array<'.Update\FileModel::class.'>')]
    #[Serializer\XmlList(entry: 'file', inline: true)]
    public array $files;
}
