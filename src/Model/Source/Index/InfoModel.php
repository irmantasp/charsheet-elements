<?php

namespace App\Model\Source\Index;

use App\Model\Source\Index\Info\AuthorModel;
use App\Model\Source\Index\Info\NameModel;
use App\Model\Source\Index\Info\Update\FileModel;
use App\Model\Source\Index\Info\UpdateModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("info")
 */
class InfoModel
{
    /**
     * @var AuthorModel|null
     *
     * @Serializer\Type("App\Model\Source\Index\Info\AuthorModel")
     */
    public ?AuthorModel $author = null;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $description = null;

    /**
     * @var NameModel|null
     *
     * @Serializer\Type("App\Model\Source\Index\Info\NameModel")
     */
    public ?NameModel $name = null;

    /**
     * @var UpdateModel|null
     *
     * @Serializer\Type("App\Model\Source\Index\Info\UpdateModel")
     */
    public ?UpdateModel $update = null;

    /**
     * @var FileModel[]
     *
     * @Serializer\Type("array<App\Model\Source\Index\Info\Update\FileModel>")
     * @Serializer\XmlList(inline=true, entry="file")
     */
    public array $files = [];

    /**
     * @return AuthorModel|null
     */
    final public function getAuthor(): ?AuthorModel
    {
        return $this->author;
    }

    /**
     * @param AuthorModel|null $author
     * @return InfoModel
     */
    final public function setAuthor(?AuthorModel $author): InfoModel
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string|null
     */
    final public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return InfoModel
     */
    final public function setDescription(?string $description): InfoModel
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return NameModel|null
     */
    final public function getName(): ?NameModel
    {
        return $this->name ?? null;
    }

    /**
     * @param NameModel|null $name
     * @return InfoModel
     */
    final public function setName(?NameModel $name): InfoModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return UpdateModel|null
     */
    final public function getUpdate(): ?UpdateModel
    {
        return $this->update;
    }

    /**
     * @param UpdateModel|null $update
     * @return InfoModel
     */
    final public function setUpdate(?UpdateModel $update): InfoModel
    {
        $this->update = $update;
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
     * @return InfoModel
     */
    final public function setFiles(array $files = []): InfoModel
    {
        $this->files = $files;
        return $this;
    }
}