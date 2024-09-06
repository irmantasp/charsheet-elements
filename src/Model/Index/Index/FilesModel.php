<?php

namespace App\Model\Index\Index;

use App\Model\Index\Index\File\FileModel;
use App\Model\Index\Index\File\ObsoleteModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('files')]
class FilesModel
{
    /**
     * @var FileModel[]
     */
    #[Serializer\Type('array<'.FileModel::class.'>')]
    #[Serializer\XmlList(entry: 'file', inline: true)]
    public array $files = [];

    /**
     * @var ObsoleteModel[]
     */
    #[Serializer\Type('array<'.ObsoleteModel::class.'>')]
    #[Serializer\XmlList(entry: 'obsolete', inline: true)]
    public array $obsolete = [];

    final public function getFiles(): array
    {
        return $this->files;
    }

    final public function setFiles(array $files): FilesModel
    {
        $this->files = $files;

        return $this;
    }

    final public function getObsolete(): array
    {
        return $this->obsolete;
    }

    final public function setObsolete(array $obsolete): FilesModel
    {
        $this->obsolete = $obsolete;

        return $this;
    }
}
