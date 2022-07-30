<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Extend
{

    /**
     * @Serializer\XmlValue
     */
    public string $value;
}