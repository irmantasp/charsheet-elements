<?php

namespace App\Property;

trait FileInterfaceTrait
{

    private ?string $__filePath = null;

    final public function getFilePath(): ?string
    {
        return $this->__filePath;
    }

    final public function setFilePath(string $path): void
    {
        $this->__filePath = $path;
    }
}