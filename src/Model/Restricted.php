<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Restricted
{

    /**
     * @Serializer\Type("array<App\Model\RestrictedEntry>")
     * @Serializer\XmlList(inline=true, entry="element|source")
     */
    public array $restricted;
}