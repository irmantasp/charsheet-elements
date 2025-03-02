<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Companion\AttributesModel;
use App\Model\Character\Character\Build\Companion\PortraitModel;
use App\Model\Character\Character\Build\Companion\SavesModel;
use App\Model\Character\Character\Build\Companion\SkillsModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('companion')]
class CompanionModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    public AttributesModel $attributes;

    public SavesModel $saves;

    public SkillsModel $skills;

    public PortraitModel $portrait;
}
