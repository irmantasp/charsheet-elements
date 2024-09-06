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
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('name')]
    public string $name;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('gender')]
    public string $gender;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('player-name')]
    public string $playerName;

    #[Serializer\Type('integer')]
    #[Serializer\SerializedName('experience')]
    public int $experience;

    #[Serializer\SerializedName('attacks')]
    #[Serializer\Type(AttacksModel::class)]
    public AttacksModel $attacks;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('backstory')]
    public string $backstory;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('background-trinket')]
    public string $backgroundTrinket;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('background-traits')]
    public string $backgroundTraits;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('background-ideals')]
    public string $backgroundIdeals;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('background-bonds')]
    public string $backgroundBonds;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('background-flaws')]
    public string $backgroundFlaws;

    #[Serializer\Type(BackgroundModel::class)]
    public BackgroundModel $background;

    #[Serializer\Type(OrganizationModel::class)]
    public ?OrganizationModel $organization;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('additional-features')]
    public string $additionalFeatures;

    #[Serializer\Type(CurrencyModel::class)]
    public CurrencyModel $currency;

    #[Serializer\Type(NotesModel::class)]
    public NotesModel $notes;

    #[Serializer\Type('string')]
    #[Serializer\SerializedName('quest')]
    public string $quest;
}
