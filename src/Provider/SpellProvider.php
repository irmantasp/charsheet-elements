<?php

namespace App\Provider;

class SpellProvider extends AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType('Spell');
    }
}