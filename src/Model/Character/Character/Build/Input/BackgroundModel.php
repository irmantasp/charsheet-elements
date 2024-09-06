<?php

namespace App\Model\Character\Character\Build\Input;

use App\Model\Character\Character\Build\Input\Background\FeatureModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('background')]
class BackgroundModel
{

    /**
     * @var FeatureModel
     */
    #[Serializer\Type(FeatureModel::class)]
    public FeatureModel $feature;
}