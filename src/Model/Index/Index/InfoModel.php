<?php

namespace App\Model\Index\Index;

use App\Model\Index\Index\Info\AuthorModel;
use App\Model\Index\Index\Info\UpdateModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('info')]
class InfoModel
{
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    public ?string $name = null;

    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    public ?string $description = null;

    #[Serializer\Type(AuthorModel::class)]
    public ?AuthorModel $author = null;

    #[Serializer\Type(UpdateModel::class)]
    public ?UpdateModel $update = null;

    final public function getAuthor(): ?AuthorModel
    {
        return $this->author;
    }

    final public function setAuthor(?AuthorModel $author): InfoModel
    {
        $this->author = $author;

        return $this;
    }

    final public function getDescription(): ?string
    {
        return $this->description;
    }

    final public function setDescription(?string $description): InfoModel
    {
        $this->description = $description;

        return $this;
    }

    final public function getName(): ?string
    {
        return $this->name ?? null;
    }

    final public function setName(?string $name): InfoModel
    {
        $this->name = $name;

        return $this;
    }

    final public function getUpdate(): ?UpdateModel
    {
        return $this->update;
    }

    final public function setUpdate(?UpdateModel $update): InfoModel
    {
        $this->update = $update;

        return $this;
    }
}
