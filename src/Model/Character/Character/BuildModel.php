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

/**
 * @Serializer\XmlRoot("build")
 */
class BuildModel
{

    /**
     * @var InputModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\InputModel")
     * @Serializer\SerializedName("input")
     * @Serializer\SkipWhenEmpty()
     */
    public ?InputModel $input;

    /**
     * @var AppearanceModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\AppearanceModel")
     * @Serializer\SerializedName("appearance")
     * @Serializer\SkipWhenEmpty()
     */
    public ?AppearanceModel $appearance;

    /**
     * @var AbilitiesModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\AbilitiesModel")
     * @Serializer\SerializedName("abilities")
     * @Serializer\SkipWhenEmpty()
     */
    public ?AbilitiesModel $abilities;

    /**
     * @var ElementsModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\ElementsModel")
     * @Serializer\SerializedName("elements")
     * @Serializer\SkipWhenEmpty()
     */
    public ?ElementsModel $elements;

    /**
     * @var DefensesModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\DefensesModel")
     * @Serializer\SerializedName("defenses")
     * @Serializer\SkipWhenEmpty()
     */
    public ?DefensesModel $defenses;

    /**
     * @var CompanionModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\CompanionModel")
     * @Serializer\SerializedName("companion")
     * @Serializer\SkipWhenEmpty()
     */
    public ?CompanionModel $companion;

    /**
     * @var EquipmentModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\EquipmentModel")
     * @Serializer\SerializedName("equipment")
     * @Serializer\SkipWhenEmpty()
     */
    public ?EquipmentModel $equipment;

    /**
     * @var SumModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\SumModel")
     * @Serializer\SerializedName("sum")
     * @Serializer\SkipWhenEmpty()
     */
    public ?SumModel $sum;

    /**
     * @var MagicModel|null
     *
     * @Serializer\Type("App\Model\Character\Character\Build\MagicModel")
     * @Serializer\SerializedName("magic")
     * @Serializer\SkipWhenEmpty()
     */
    public ?MagicModel $model;

}