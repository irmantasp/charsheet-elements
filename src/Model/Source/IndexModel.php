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

    /**
     * @return InfoModel
     */
    final public function getInfo(): InfoModel
    {
        return $this->info;
    }

    /**
     * @param InfoModel $info
     * @return IndexModel
     */
    final public function setInfo(InfoModel $info): IndexModel
    {
        $this->info = $info;
        return $this;
    }
}