<?php

namespace App\Model\Elements\Elements\Element;

use App\Model\Elements\Elements\Element\Rules\RuleModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("rules")
 */
class RulesModel
{

    /**
     * @var RuleModel[]
     *
     * @Serializer\Type("array<App\Model\Index\Elements\Element\Rules\RuleModel>")
     * @Serializer\XmlList(inline=true, entry="grant|stat|select")
     */
    public array $rules;
}