<?php

namespace App\Model\Source\Index;

use App\Model\Source\Index\Info\AuthorModel;
use App\Model\Source\Index\Info\NameModel;
use App\Model\Source\Index\Info\UpdateModel;
use JMS\Serializer\Annotation as Serializer;

class InfoModel
{
    /**
     * @var AuthorModel
     *
     * @Serializer\Type("App\Model\Source\Index\Info\AuthorModel")
     */
    public AuthorModel $author;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $description;

    /**
     * @var NameModel
     *
     * @Serializer\Type("App\Model\Source\Index\Info\NameModel")
     */
    public NameModel $name;

    /**
     * @var UpdateModel
     *
     * @Serializer\Type("App\Model\Source\Index\Info\UpdateModel")
     */
    public UpdateModel $update;
}