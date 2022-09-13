<?php

namespace App\Property;

interface FileInterface
{

    public function setFilePath(string $path): FileInterface;

    public function getFilePath(): string;
}