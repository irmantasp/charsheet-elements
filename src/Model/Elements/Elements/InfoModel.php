<?php

namespace App\Model\Elements\Elements;

use App\Model\Elements\Elements\Info\AuthorModel;
use App\Model\Elements\Elements\Info\NameModel;
use App\Model\Elements\Elements\Info\UpdateModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("info")
 */
class InfoModel
{
    /**
     * @var AuthorModel
     *
     * @Serializer\Type("App\Model\Elements\Elements\Info\AuthorModel")
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
     * @Serializer\Type("App\Model\Elements\Elements\Info\NameModel")
     */
    public NameModel $name;

    /**
     * @var UpdateModel
     *
     * @Serializer\Type("App\Model\Elements\Elements\Info\UpdateModel")
     */
    public UpdateModel $update;
}