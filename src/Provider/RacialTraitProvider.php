<?php

namespace App\Provider;

class RacialTraitProvider extends AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType('Racial Trait');
    }
}