<?php

namespace App\Property;

interface FileInterface
{
    public function setFilePath(string $path): void;

    public function getFilePath(): ?string;
}
