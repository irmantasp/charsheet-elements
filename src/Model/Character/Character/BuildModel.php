<?php

namespace App\Model\Character\Character;

use App\Model\Character\Character\Build\AbilitiesModel;
use App\Model\Character\Character\Build\AppearanceModel;
use App\Model\Character\Character\Build\CompanionModel;
use App\Model\Character\Character\Build\DefensesModel;
use App\Model\Character\Character\Build\ElementsModel;
use App\Model\Character\Character\Build\EquipmentModel;
use App\Model\Character\Character\Build\InputModel;
use App\Model\Character\Character\Build\MagicModel;
use App\Model\Character\Character\Build\SumModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('build')]
class BuildModel
{
    #[Serializer\Type(InputModel::class)]
    #[Serializer\SerializedName('input')]
    #[Serializer\SkipWhenEmpty]
    public ?InputModel $input;

    #[Serializer\Type(AppearanceModel::class)]
    #[Serializer\SerializedName('appearance')]
    #[Serializer\SkipWhenEmpty]
    public ?AppearanceModel $appearance;

    #[Serializer\Type(AbilitiesModel::class)]
    #[Serializer\SerializedName('abilities')]
    #[Serializer\SkipWhenEmpty]
    public ?AbilitiesModel $abilities;

    #[Serializer\Type(ElementsModel::class)]
    #[Serializer\SerializedName('elements')]
    #[Serializer\SkipWhenEmpty]
    public ?ElementsModel $elements;

    #[Serializer\Type(DefensesModel::class)]
    #[Serializer\SerializedName('defenses')]
    #[Serializer\SkipWhenEmpty]
    public ?DefensesModel $defenses;

    #[Serializer\Type(CompanionModel::class)]
    #[Serializer\SerializedName('companion')]
    #[Serializer\SkipWhenEmpty]
    public ?CompanionModel $companion;

    #[Serializer\Type(EquipmentModel::class)]
    #[Serializer\SerializedName('equipment')]
    #[Serializer\SkipWhenEmpty]
    public ?EquipmentModel $equipment;

    #[Serializer\Type(SumModel::class)]
    #[Serializer\SerializedName('sum')]
    #[Serializer\SkipWhenEmpty]
    public ?SumModel $sum;

    #[Serializer\Type(MagicModel::class)]
    #[Serializer\SerializedName('magic')]
    public ?MagicModel $model;
}
