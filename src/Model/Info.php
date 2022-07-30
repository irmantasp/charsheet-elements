<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Info
{

    public string $name;

    /**
     * @Serializer\Type("App\Model\Update")
     */
    public Update $update;

}