<?php

namespace App\Model\Index\Index\Info;

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
     * @var \App\Model\Index\Index\FileModel[]
     *
     * @Serializer\Type("array<App\Model\Source\Index\Info\Update\FileModel>")
     * @Serializer\XmlList(inline=true, entry="file")
     */
    public array $files;

    /**
     * @return string
     */
    final public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return UpdateModel
     */
    final public function setVersion(string $version): UpdateModel
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return array
     */
    final public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param array $files
     * @return UpdateModel
     */
    final public function setFiles(array $files): UpdateModel
    {
        $this->files = $files;
        return $this;
    }
}