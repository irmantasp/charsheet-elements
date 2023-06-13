<?php

namespace App\Model\Character\Character\Build\Companion;

use App\Model\Character\Character\Build\Companion\Skills\SkillModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("skills")
 */
class SkillsModel
{

    /**
     * @var SkillModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Companion\Skills\SkillModel>")
     * @Serializer\XmlList(inline=true, entry="skill")
     */
    public array $skills;
}