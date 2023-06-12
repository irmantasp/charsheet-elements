<?php

namespace App\Model\Character\Character\Build\Input;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("organization")
 */
class OrganizationModel
{
    public string $name;

    public string $symbol;

    public string $allies;

}