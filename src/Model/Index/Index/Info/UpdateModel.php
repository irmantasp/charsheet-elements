<?php

namespace App\Model\Index\Index\Info;

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
    #[Serializer\Type('array<'.FileModel::class.'>')]
    #[Serializer\XmlList(entry: 'file', inline: true)]
    public array $files;

    final public function getVersion(): string
    {
        return $this->version;
    }

    final public function setVersion(string $version): UpdateModel
    {
        $this->version = $version;

        return $this;
    }

    final public function getFiles(): array
    {
        return $this->files;
    }

    final public function setFiles(array $files): UpdateModel
    {
        $this->files = $files;

        return $this;
    }
}
