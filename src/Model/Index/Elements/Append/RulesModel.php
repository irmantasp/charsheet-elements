<?php

namespace App\Model\Index\Elements\Append;

use App\Model\Index\Elements\Append\Rules\GrantModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("rules")
 */
class RulesModel
{

    /**
     * @var GrantModel[]
     *
     * @Serializer\Type("array<App\Model\Index\Elements\Append\Rules\GrantModel>")
     * @Serializer\XmlList(inline=true, entry="grant")
     */
    public array $rules;
}