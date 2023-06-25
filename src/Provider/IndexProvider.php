<?php

namespace App\Provider;

use App\Model\Index\IndexModel;
use JMS\Serializer\SerializerInterface;

class IndexProvider
{
    private string $directory;

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer, string $indexDir)
    {
        $this->directory = $indexDir;
        $this->serializer = $serializer;
    }

    final public function getFromUrl(string $url): IndexModel
    {
        $content = file_get_contents($url);
        if ($content === false) {
            throw new \RuntimeException(sprintf('Unable to get additional content from this URL: %url', $url));
        }

        $file = new \SplFileInfo($url);
        if (!$file->getFilename()) {
            throw new \RuntimeException(sprintf('Unable to get file name for additional content index from this URL: %url', $url));
        }

        $directory = $this->directory;
        if (!is_dir($directory)) {
            if (!mkdir($directory, 0755, true) && !is_dir($directory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $directory));
            }
        }


        $save = file_put_contents(sprintf('%s/%s', $directory, $file->getFilename()), $file);
        if ($save === false) {
            throw new \RuntimeException(sprintf('Unable to save additional content index file from this URL: %url', $url));
        }

        try {
            return $this->serializer->deserialize($content, IndexModel::class, 'xml');
        }
        catch (\Throwable) {
            throw new \RuntimeException(sprintf('Unable to process additional content index file from this URL: %url', $url));
        }
    }

}