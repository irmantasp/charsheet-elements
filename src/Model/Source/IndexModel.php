<?php

namespace App\Model\Source;

use App\Model\Source\Index\InfoModel;
use JMS\Serializer\Annotation as Serializer;


/**
 * @Serializer\XmlRoot("index")
 */
class IndexModel
{

    /**
     * @var InfoModel
     *
     * @Serializer\Type("App\Model\Source\Index\InfoModel")
     */
    public InfoModel $info;
}