<?php

namespace App\Model\Elements\Elements\Info;

use App\Model\Index\Index\Info\Update\FileModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("update")
 */
class UpdateModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $version;


    /**
     * @var FileModel[]
     *
     * @Serializer\Type("array<App\Model\Source\Index\Info\Update\FileModel>")
     * @Serializer\XmlList(inline=true, entry="file")
     */
    public array $files;
}