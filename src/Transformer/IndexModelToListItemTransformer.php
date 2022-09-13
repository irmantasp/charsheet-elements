<?php

namespace App\Transformer;

use App\Item\ListItem;
use App\Model\Source\Index\Info\AuthorModel;
use App\Model\Source\Index\Info\NameModel;
use App\Model\Source\Index\Info\UpdateModel;
use App\Model\Source\Index\InfoModel;
use App\Model\Source\IndexModel;

class IndexModelToListItemTransformer
{
    final public function transformMultiple(array $sources): array {
        return array_map(function ($source) {
            return $this->transform($source);
        }, $sources);
    }

    final public function transform(IndexModel $source): ?ListItem
    {
        $entry = [];
        if (!$source->getInfo() instanceof InfoModel) {
            return null;
        }

        $info = $source->getInfo();

        if ($info->getName() instanceof NameModel) {
            $entry['name'] = $info->getName()->getValue();
            $entry['url'] = $info->getName()->getUrl();
        }

        if ($info->getDescription()) {
            $entry['description'] = $info->getDescription();
        }

        if ($info->getAuthor() instanceof AuthorModel) {
            $entry['author'] = $info->getAuthor()->getValue();
            $entry['authorUrl'] = $info->getAuthor()->getUrl();
        }

        if ($info->getUpdate() instanceof UpdateModel) {
            $entry['version'] = $info->getUpdate()->getVersion();
        }

        $entry['__filePath'] = $source->getFilePath();

        return new ListItem($entry);
    }
}