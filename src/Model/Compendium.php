<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Compendium
{
    /**
     * @Serializer\XmlAttribute
     */
    public bool $display;

}