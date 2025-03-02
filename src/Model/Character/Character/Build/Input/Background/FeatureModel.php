<?php

namespace App\Model\Character\Character\Build\Input\Background;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('feature')]
class FeatureModel
{
    #[Serializer\XmlAttribute]
    public string $name;

    public string $description;
}
