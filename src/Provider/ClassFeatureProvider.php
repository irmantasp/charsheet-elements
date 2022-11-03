<?php

namespace App\Provider;

class ClassFeatureProvider extends AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType('Class Feature');
    }
}