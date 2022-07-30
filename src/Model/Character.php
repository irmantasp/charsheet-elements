<?php

namespace App\Model;

class Character
{

    public string $version;

    public bool $preview;

    public Information $information;

    public DisplayProperties $displayProperties;

    public Build $build;

    public Sources $sources;
}