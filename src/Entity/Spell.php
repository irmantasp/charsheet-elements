<?php

namespace App\Entity;

class Spell
{
    public string $id;

    public string $name;

    public string $source;

    public int $level;

    public string $school;

    public string $time;

    public string $duration;

    public string $range;

    public bool $hasVerbalComponent;

    public bool $hasSomaticComponent;

    public bool $hasMaterialComponent;

    public string $materialComponent;

    public bool $isConcentration;

    public bool $isRitual;

    public string $description;
}