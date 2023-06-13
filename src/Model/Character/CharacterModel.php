<?php

namespace App\Model\Character;

use App\Model\Character\Character\BuildModel;
use App\Model\Character\Character\DisplayPropertiesModel;
use App\Model\Character\Character\InformationModel;
use App\Model\Character\Character\SourcesModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("character")
 */
class CharacterModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $version;

    /**
     * @var bool
     *
     * @Serializer\Type("bool")
     * @Serializer\XmlAttribute()
     */
    public bool $preview;

    /**
     * @var InformationModel
     *
     * @Serializer\Type("App\Model\Character\Character\InformationModel")
     */
    public InformationModel $information;

    /**
     * @var DisplayPropertiesModel
     *
     * @Serializer\Type("App\Model\Character\Character\DisplayPropertiesModel")
     * @Serializer\SerializedName("display-properties")
     */
    public DisplayPropertiesModel $displayProperties;

    /**
     * @var BuildModel
     *
     * @Serializer\Type("App\Model\Character\Character\BuildModel")
     * @Serializer\SerializedName("build")
     */
    public BuildModel $build;

    /**
     * @var SourcesModel
     *
     * @Serializer\Type("App\Model\Character\Character\SourcesModel")
     * @Serializer\SerializedName("sources")
     */
    public SourcesModel $sources;
}