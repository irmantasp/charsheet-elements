<?php

namespace App\Model\Index\Index\Info;

use App\Model\Index\Index\Info\Update\FileModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("update")]
class UpdateModel
{

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $version;

    /**
     * @var FileModel[]
     */
    #[Serializer\Type("array<" . FileModel::class . ">")]
    #[Serializer\XmlList(entry: "file", inline: true)]
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