<?php

namespace App\Provider;

class RaceProvider extends AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType('Race');
    }
}