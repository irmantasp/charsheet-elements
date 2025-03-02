<?php

namespace App\Model\Elements\Elements;

use App\Model\Elements\Elements\Element\CompendiumModel;
use App\Model\Elements\Elements\Element\ExtractModel;
use App\Model\Elements\Elements\Element\MulticlassModel;
use App\Model\Elements\Elements\Element\RulesModel;
use App\Model\Elements\Elements\Element\SettersModel;
use App\Model\Elements\Elements\Element\SheetModel;
use App\Model\Elements\Elements\Element\SpellcastingModel;
use JMS\Serializer\Annotation as Serializer;

#[\AllowDynamicProperties] #[Serializer\XmlRoot('element')]
class ElementModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    #[Serializer\XmlAttribute]
    public string $source;

    #[Serializer\XmlAttribute]
    public string $type;

    #[Serializer\XmlAttribute]
    public string $id;

    #[Serializer\XmlAttribute]
    public string $supports;

    /**
     * @TODO fix html handler.
     */
    #[Serializer\Type('string')]
    public string $description;

    #[Serializer\Type(SheetModel::class)]
    public SheetModel $sheet;

    #[Serializer\Type(RulesModel::class)]
    public RulesModel $rules;

    public string $requirements;

    #[Serializer\Type(SettersModel::class)]
    public SettersModel $setters;

    public string $prerequisite;

    #[Serializer\Type(CompendiumModel::class)]
    public CompendiumModel $compendium;

    #[Serializer\Type(SpellcastingModel::class)]
    public SpellcastingModel $spellcasting;

    #[Serializer\Type(MulticlassModel::class)]
    public MulticlassModel $multiclass;

    #[Serializer\Type(ExtractModel::class)]
    #[Serializer\SkipWhenEmpty]
    public ?ExtractModel $extract = null;

    #[Serializer\Type(SettersModel::class)]
    #[Serializer\SkipWhenEmpty]
    public ?SettersModel $setter = null;
}
