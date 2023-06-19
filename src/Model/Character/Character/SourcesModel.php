<?php

namespace App\Model\Character\Character;

use App\Model\Character\Character\Sources\RestrictedModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("sources")
 */
class SourcesModel
{

    /**
     * @var RestrictedModel
     *
     * @Serializer\Type("App\Model\Character\Character\Sources\RestrictedModel")
     * @Serializer\SerializedName("restricted")
     */
    public RestrictedModel $restricted;

}