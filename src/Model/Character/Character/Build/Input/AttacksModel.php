<?php

namespace App\Model\Character\Character\Build\Input;

use App\Model\Character\Character\Build\Input\Attacks\AttackModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("attacks")
 */
class AttacksModel
{

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $description;

    /**
     * @var AttackModel[]
     *
     * @Serializer\Type("array<App\Model\Character\Character\Build\Input\Attacks\AttackModel>")
     * @Serializer\XmlList(inline=true, entry="attack")
     */
    public array $attacks;
}