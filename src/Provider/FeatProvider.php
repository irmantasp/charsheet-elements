<?php

namespace App\Provider;

class FeatProvider extends AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType('Feat');
    }
}