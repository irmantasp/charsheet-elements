<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Multiclass
{

    /**
     * @Serializer\XmlAttribute
     */
    public string $id;

    /**
     * @Serializer\Type("HTML")
     */
    public string $prerequisite;

    /**
     * @Serializer\Type("HTML")
     */
    public string $requirements;

    /**
     * @Serializer\Type("array<App\Model\Setter>")
     * @Serializer\XmlList(entry="set")
     * @Serializer\SkipWhenEmpty
     *
     * @var Setter[]
     */
    public array $setters;

    /**
     * @Serializer\Type("array<App\Model\Rule>")
     * @Serializer\XmlList(entry="grant|select|stat")
     * @Serializer\SkipWhenEmpty
     */
    public array $rules;
}