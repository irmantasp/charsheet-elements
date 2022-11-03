<?php

namespace App\Provider;

class BackgroundProvider extends  AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType('Background');
    }
}