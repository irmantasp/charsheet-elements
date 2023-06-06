<?php

namespace App\Model\Source;

use App\Model\Source\Index\InfoModel;
use App\Property\FileInterface;
use App\Property\FileInterfaceTrait;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\XmlDiscriminator;

/**
 * @Serializer\XmlRoot("index")
 * @XmlDiscriminator(cdata=false)
 */
class IndexModel implements FileInterface
{
    use FileInterfaceTrait;

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