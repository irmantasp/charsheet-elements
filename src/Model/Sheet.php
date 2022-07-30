<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Sheet
{
    /**
     * @Serializer\XmlAttribute
     */
    public bool $display;

    /**
     * @Serializer\XmlAttribute
     */
    public string $alt;

    /**
     * @Serializer\XmlAttribute
     */
    public string $usage;

    /**
     * @Serializer\XmlAttribute
     */
    public string $action;

    /**
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty
     */
    public string $description;

}