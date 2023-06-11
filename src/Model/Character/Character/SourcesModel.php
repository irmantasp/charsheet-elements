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
     * @var RestrictedModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Sources\RestrictedModel")
     * @Serializer\SerializedName("restricted")
     * @Serializer\SkipWhenEmpty()
     */
    public ?RestrictedModel $restricted;


}