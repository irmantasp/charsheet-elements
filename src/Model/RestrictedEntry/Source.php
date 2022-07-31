<?php

namespace App\Model\RestrictedEntry;

use App\Model\RestrictedEntry;
use JMS\Serializer\Annotation as Serializer;

class Source extends RestrictedEntry
{
    /**
     * @Serializer\XmlAttribute
     */
    public string $id;
}