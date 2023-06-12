<?php

namespace App\Model\Character\Character\Build;

use App\Model\Character\Character\Build\Companion\AttributesModel;
use App\Model\Character\Character\Build\Companion\PortraitModel;
use App\Model\Character\Character\Build\Companion\SavesModel;
use App\Model\Character\Character\Build\Companion\SkillsModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("companion")
 */
class CompanionModel
{

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var AttributesModel
     */
    public AttributesModel $attributes;

    /**
     * @var SavesModel
     */
    public SavesModel $saves;

    /**
     * @var SkillsModel
     */
    public SkillsModel $skills;

    /**
     * @var PortraitModel
     */
    public PortraitModel $portrait;
}