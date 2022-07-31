<?php

namespace App\Model;

class BuildElement
{
    public string $type;

    public string $name;

    public string $id;

    public string $rndhp;

    public int $requiredLevel;

    public string $checksum;

    public string $registered;

    public bool $multiclass;

    public string $class;

    public array $elements;

    public ElementInterface $element;
}