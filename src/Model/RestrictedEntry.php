<?php

namespace App\Model;

 use JMS\Serializer\Annotation as Serializer;

 abstract class RestrictedEntry
{
    /**
     * @Serializer\XmlValue
     */
    public string $value;
}