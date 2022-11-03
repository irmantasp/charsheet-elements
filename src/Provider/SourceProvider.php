<?php

namespace App\Provider;

use App\Model\Source\IndexModel;

class SourceProvider extends AbstractSerializedDataProvider
{

    final public function getSources(): array
    {
        $files = $this->getFiles('index', 'index');

        return $this->getContent($files, IndexModel::class, 'xml');
    }
}