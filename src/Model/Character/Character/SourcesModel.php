<?php

namespace App\Model\Character\Character;

use App\Model\Character\Character\Sources\RestrictedModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('sources')]
class SourcesModel
{
    #[Serializer\Type(RestrictedModel::class)]
    #[Serializer\SerializedName('restricted')]
    public RestrictedModel $restricted;
}
