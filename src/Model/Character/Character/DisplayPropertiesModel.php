<?php

namespace App\Model\Character\Character;

use App\Model\Character\Character\DisplayProperties\PortraitModel;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @Serializer\XmlRoot("display-properties")
 */
class DisplayPropertiesModel
{

    /**
     * @var bool
     *
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("favorite")
     * @Serializer\XmlAttribute()
     */
    public bool $favorite;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @SerializedName("name")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $name;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @SerializedName("race")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $race;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @SerializedName("class")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $class;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @SerializedName("archetype")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $archetype;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @SerializedName("background")
     * @Serializer\SkipWhenEmpty()
     */
    public ?string $background;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     * @SerializedName("level")
     * @Serializer\SkipWhenEmpty()
     */
    public ?int $level;

    /**
     * @var PortraitModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\DisplayProperties\PortraitModel")
     * @Serializer\SerializedName("portrait")
     * @Serializer\SkipWhenEmpty()
     */
    public ?PortraitModel $portrait;

}