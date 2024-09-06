<?php

namespace App\Model\Character\Character\Build\Companion;

use App\Model\Character\Character\Build\Companion\Skills\SkillModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('skills')]
class SkillsModel
{

    /**
     * @var SkillModel[]
     */
    #[Serializer\Type('array<' . SkillModel::class . '>')]
    #[Serializer\XmlList(entry: 'skill', inline: true)]
    public array $skills;
}