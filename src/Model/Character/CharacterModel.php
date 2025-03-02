<?php

namespace App\Model\Character;

use App\Model\Character\Character\BuildModel;
use App\Model\Character\Character\DisplayPropertiesModel;
use App\Model\Character\Character\InformationModel;
use App\Model\Character\Character\SourcesModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('character')]
class CharacterModel
{
    #[Serializer\XmlAttribute]
    public string $version;

    #[Serializer\XmlAttribute]
    public bool $preview;

    #[Serializer\Type(InformationModel::class)]
    public InformationModel $information;

    #[Serializer\Type(DisplayPropertiesModel::class)]
    #[Serializer\SerializedName('display-properties')]
    public DisplayPropertiesModel $displayProperties;

    #[Serializer\Type(BuildModel::class)]
    #[Serializer\SerializedName('build')]
    public BuildModel $build;

    #[Serializer\Type(SourcesModel::class)]
    #[Serializer\SerializedName('sources')]
    public SourcesModel $sources;
}
