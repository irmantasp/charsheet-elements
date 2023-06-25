<?php

namespace App\Model\Index\Index;

use App\Model\Index\Index\File\FileModel;
use App\Model\Index\Index\File\ObsoleteModel;
use JMS\Serializer\Annotation as Serializer;


/**
 * @Serializer\XmlRoot("files")
 */
class FilesModel
{
    /**
     * @var FileModel[]
     *
     * @Serializer\Type("array<App\Model\Source\Index\File\FileModel>")
     * @Serializer\XmlList(inline=true, entry="file")
     */
    public array $files = [];

    /**
     * @var ObsoleteModel[]
     *
     * @Serializer\Type("array<App\Model\Source\Index\File\ObsoleteModel>")
     * @Serializer\XmlList(inline=true, entry="obsolete")
     */
    public array $obsolete = [];

    /**
     * @return array
     */
    final public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param array $files
     * @return FilesModel
     */
    final public function setFiles(array $files): FilesModel
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return array
     */
    final public function getObsolete(): array
    {
        return $this->obsolete;
    }

    /**
     * @param array $obsolete
     * @return FilesModel
     */
    final public function setObsolete(array $obsolete): FilesModel
    {
        $this->obsolete = $obsolete;
        return $this;
    }

}