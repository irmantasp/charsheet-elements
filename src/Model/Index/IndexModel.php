<?php

namespace App\Model\Index;

use App\Model\Index\Index\FilesModel;
use App\Model\Index\Index\InfoModel;
use App\Property\FileInterface;
use App\Property\FileInterfaceTrait;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\XmlDiscriminator;

#[Serializer\XmlRoot('index')]
#[XmlDiscriminator(cdata: false)]
class IndexModel implements FileInterface
{
    use FileInterfaceTrait;

    #[Serializer\Type(InfoModel::class)]
    public InfoModel $info;

    #[Serializer\Type(FilesModel::class)]
    #[Serializer\SkipWhenEmpty]
    public FilesModel $files;

    final public function getInfo(): InfoModel
    {
        return $this->info;
    }

    final public function setInfo(InfoModel $info): IndexModel
    {
        $this->info = $info;

        return $this;
    }

    final public function getFiles(): FilesModel
    {
        return $this->files;
    }

    final public function setFiles(FilesModel $files): IndexModel
    {
        $this->files = $files;

        return $this;
    }
}
