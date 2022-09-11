<?php

namespace App\Model\Index\Elements;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("element")
 */
class ElementModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $type;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $resource;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute()
     */
    public string $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $supports;

    /**
     * @var string
     *
     * @Serializer\Type("HTML")
     */
    public string $description;

    public \stdClass $sheet;

    public \stdClass $rules;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $requirements;

    public \stdClass $setters;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $prerequisite;

    public \stdClass $compendium;

    public \stdClass $spellcasting;

    public \stdClass $multiclass;

    public \stdClass $extract;

    public \stdClass $setter;
}