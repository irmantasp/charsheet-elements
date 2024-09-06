<?php

namespace App\Model\Elements\Elements;

use App\Model\Elements\Elements\Info\AuthorModel;
use App\Model\Elements\Elements\Info\NameModel;
use App\Model\Elements\Elements\Info\UpdateModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('info')]
class InfoModel
{
    #[Serializer\Type(AuthorModel::class)]
    public AuthorModel $author;

    #[Serializer\SkipWhenEmpty]
    public ?string $description = null;

    #[Serializer\Type(NameModel::class)]
    public NameModel $name;

    #[Serializer\Type(UpdateModel::class)]
    public UpdateModel $update;
}
