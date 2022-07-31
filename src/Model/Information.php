<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class Information
{

    public string $group;

    /**
     * @Serializer\SerializedName("generationOption")
     */
    public int $generationOption;
}