<?php

namespace App\Model\Elements\Elements;

use App\Model\Elements\Elements\Info\AuthorModel;
use App\Model\Elements\Elements\Info\NameModel;
use App\Model\Elements\Elements\Info\UpdateModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot("info")]
class InfoModel
{
    /**
     * @var AuthorModel
     */
    #[Serializer\Type(AuthorModel::class)]
    public AuthorModel $author;

    /**
     * @var string|null
     */
    #[Serializer\SkipWhenEmpty]
    public ?string $description = null;

    /**
     * @var NameModel
     */
    #[Serializer\Type(NameModel::class)]
    public NameModel $name;

    /**
     * @var UpdateModel
     */
    #[Serializer\Type(UpdateModel::class)]
    public UpdateModel $update;
}