<?php

namespace App\Model\Elements\Elements;

use AllowDynamicProperties;
use App\Model\Elements\Elements\Element\CompendiumModel;
use App\Model\Elements\Elements\Element\ExtractModel;
use App\Model\Elements\Elements\Element\MulticlassModel;
use App\Model\Elements\Elements\Element\RulesModel;
use App\Model\Elements\Elements\Element\SettersModel;
use App\Model\Elements\Elements\Element\SheetModel;
use App\Model\Elements\Elements\Element\SpellcastingModel;
use JMS\Serializer\Annotation as Serializer;

#[AllowDynamicProperties] #[Serializer\XmlRoot("element")]
class ElementModel
{
    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $name;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $source;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $type;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $id;

    /**
     * @var string
     */
    #[Serializer\XmlAttribute]
    public string $supports;

    /**
     * @TODO fix html handler.
     * @var string
     */
    #[Serializer\Type("string")]
    public string $description;

    /**
     * @var SheetModel
     */
    #[Serializer\Type(SheetModel::class)]
    public SheetModel $sheet;

    /**
     * @var RulesModel
     */
    #[Serializer\Type(RulesModel::class)]
    public RulesModel $rules;

    /**
     * @var string
     */
    public string $requirements;

    /**
     * @var SettersModel
     */
    #[Serializer\Type(SettersModel::class)]
    public SettersModel $setters;

    /**
     * @var string
     */
    public string $prerequisite;

    /**
     * @var CompendiumModel
     */
    #[Serializer\Type(CompendiumModel::class)]
    public CompendiumModel $compendium;

    /**
     * @var SpellcastingModel
     */
    #[Serializer\Type(SpellcastingModel::class)]
    public SpellcastingModel $spellcasting;

    /**
     * @var MulticlassModel
     */
    #[Serializer\Type(MulticlassModel::class)]
    public MulticlassModel $multiclass;

    /**
     * @var ExtractModel|null
     */
    #[Serializer\Type(ExtractModel::class)]
    #[Serializer\SkipWhenEmpty]
    public ?ExtractModel $extract = null;

    /**
     * @var SettersModel|null
     */
    #[Serializer\Type(SettersModel::class)]
    #[Serializer\SkipWhenEmpty]
    public ?SettersModel $setter = null;
}