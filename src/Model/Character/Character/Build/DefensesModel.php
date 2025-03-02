<?php

namespace App\Model\Character\Character\Build;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('defenses')]
class DefensesModel
{
    public string $conditional;
}
