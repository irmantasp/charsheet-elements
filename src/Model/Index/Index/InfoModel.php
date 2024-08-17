<?php

namespace App\Model\Index\Index;

use App\Model\Index\Index\Info\AuthorModel;
use App\Model\Index\Index\Info\UpdateModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("info")]
class InfoModel
{
    /**
     * @var string|null
     */
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    public ?string $name = null;

    /**
     * @var string|null
     */
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    public ?string $description = null;

    /**
     * @var AuthorModel|null
     */
    #[Serializer\Type(AuthorModel::class)]
    public ?AuthorModel $author = null;

    /**
     * @var UpdateModel|null
     */
    #[Serializer\Type(UpdateModel::class)]
    public ?UpdateModel $update = null;

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
     * @return string|null
     */
    final public function getName(): ?string
    {
        return $this->name ?? null;
    }

    /**
     * @param string|null $name
     * @return InfoModel
     */
    final public function setName(?string $name): InfoModel
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
}