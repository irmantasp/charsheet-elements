<?php

namespace App\Model\Index\Elements;

use App\Model\Index\Elements\Element\CompendiumModel;
use App\Model\Index\Elements\Element\ExtractModel;
use App\Model\Index\Elements\Element\MulticlassModel;
use App\Model\Index\Elements\Element\RulesModel;
use App\Model\Index\Elements\Element\SettersModel;
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
    public string $source;

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

    /**
     * @var RulesModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\RulesModel")
     */
    public RulesModel $rules;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $requirements;

    /**
     * @var SettersModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\SettersModel")
     */
    public SettersModel $setters;

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

    /**
     * @var MulticlassModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\MulticlassModel")
     */
    public MulticlassModel $multiclass;

    /**
     * @var ExtractModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\ExtractModel")
     * @Serializer\SkipWhenEmpty()
     */
    public ExtractModel $extract;

    /**
     * @var SettersModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\SettersModel")
     * @Serializer\SkipWhenEmpty()
     */
    public SettersModel $setter;
}