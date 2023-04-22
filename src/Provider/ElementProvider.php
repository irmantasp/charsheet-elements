<?php

namespace App\Provider;

class ElementProvider extends AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType();
    }
}
