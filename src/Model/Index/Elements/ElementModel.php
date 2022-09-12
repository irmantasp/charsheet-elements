<?php

namespace App\Model\Index\Elements;

use App\Model\Index\Elements\Element\CompendiumModel;
use App\Model\Index\Elements\Element\SheetModel;
use App\Model\Index\Elements\Element\SpellcastingModel;
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

    /**
     * @var SheetModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\SheetModel")
     */
    public SheetModel $sheet;

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

    /**
     * @var CompendiumModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\CompendiumModel")
     */
    public CompendiumModel $compendium;

    /**
     * @var SpellcastingModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\SpellcastingModel")
     */
    public SpellcastingModel $spellcasting;

    public \stdClass $multiclass;

    public \stdClass $extract;

    public \stdClass $setter;
}