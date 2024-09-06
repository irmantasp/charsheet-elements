<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Input\AttacksModel;
use App\Model\Character\Character\Build\Input\BackgroundModel;
use App\Model\Character\Character\Build\Input\CurrencyModel;
use App\Model\Character\Character\Build\Input\NotesModel;
use App\Model\Character\Character\Build\Input\OrganizationModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('input')]
class InputModel
{
    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     */
    public string $name;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("gender")
     */
    public string $gender;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("player-name")
     */
    public string $playerName;

    /**
     * @var int
     * 
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("experience")
     */
    public int $experience;

    /**
     * @var AttacksModel
     *
     * @Serializer\SerializedName("attacks")
     */
    #[Serializer\Type(AttacksModel::class)]
    public AttacksModel $attacks;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("backstory")
     */
    public string $backstory;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("background-trinket")
     */
    public string $backgroundTrinket;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("background-traits")
     */
    public string $backgroundTraits;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("background-ideals")
     */
    public string $backgroundIdeals;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("background-bonds")
     */
    public string $backgroundBonds;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("background-flaws")
     */
    public string $backgroundFlaws;

    /**
     * @var BackgroundModel
     */
    #[Serializer\Type(BackgroundModel::class)]
    public BackgroundModel $background;

    /**
     * @var OrganizationModel|null
     */
    #[Serializer\Type(OrganizationModel::class)]
    public ?OrganizationModel $organization;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("additional-features")
     */
    public string $additionalFeatures;

    /**
     * @var CurrencyModel
     */
    #[Serializer\Type(CurrencyModel::class)]
    public CurrencyModel $currency;

    /**
     * @var NotesModel
     */
    #[Serializer\Type(NotesModel::class)]
    public NotesModel $notes;

    /**
     * @var string
     * 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("quest")
     */
    public string $quest;
}