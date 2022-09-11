<?php

namespace App\Helper;

use App\Provider\FileProvider;

trait FileProviderTrait
{

    final public function setWorkingDir(?string $dir = null): FileProvider
    {
        return $this->fileProvider->setWorkingDir($dir);
    }

    final public function getFilesByExtension(string $fileExtension): array
    {
        return $this->fileProvider->getFilesByExtension($fileExtension);
    }
}