<?php

namespace App\Provider;

class ClassProvider extends AbstractElementsDataProvider
{
    final public function getElements(): array
    {
        return $this->getElementsByType('Class');
    }
}