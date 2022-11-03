<?php

namespace App\Provider;

class ItemProvider extends AbstractElementsDataProvider
{

    final public function getElements(): array
    {
        return $this->getElementsByType('Item');
    }
}