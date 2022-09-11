<?php

namespace App\Model\Index;

use App\Model\Index\Elements\InfoModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("elements")
 */
class ElementsModel
{

    /**
     * @var InfoModel
     *
     * @Serializer\Type("App\Model\Index\Elements\InfoModel")
     */
    public InfoModel $info;
}