<?php

namespace App\Provider;

use App\Helper\FileProviderTrait;
use App\Helper\SerializerHelperTrait;
use App\Property\FileInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\PruneableInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\Cache\ItemInterface;

abstract class AbstractSerializedDataProvider
{
    use FileProviderTrait;
    use SerializerHelperTrait;

    public FileProvider $fileProvider;
    private SerializerInterface $serializer;
    public PruneableInterface $cache;
    public SluggerInterface $slug;

    public function __construct(SerializerInterface $serializer, FileProvider $fileProvider)
    {
        $this->serializer = $serializer;
        $this->fileProvider = $fileProvider;
        $this->cache = new FilesystemAdapter();
        $this->slug = new AsciiSlugger();

    }

    final public function getFiles(string $dir, string $fileExtension): array
    {
        $this->setWorkingDir($dir);

        return $this->fileProvider->getFilesContentByFile($this->getFilesByExtension($fileExtension));
    }

    final public function getContent(array $files, string $type, string $format): array {
        return $this->cache->get($this->getCacheKey([$type, $format]), function (ItemInterface $item) use ($files, $type, $format)
        {
            $item->expiresAfter(30*24*60*60);

            return $this->getNewContent($files, $type, $format);
        });
    }

    final public function getNewContent(array $files, string $type, string $format): array
    {
        return array_map(function ($file, $content) use ($type, $format) {
            $object = $this->deserialize($content, $type, $format);
            if ($object instanceof FileInterface) {
                $object->setFilePath($file);
            }

            return $object;
        }, array_keys($files), $files);
    }

    final public function getCacheKey(array $arguments): string
    {
        if (empty($arguments)) {
            throw new \RuntimeException('Arguments list for cache key generation cannot be empty.');
        }

        return $this->slug->slug(implode('-', $arguments));
    }
}