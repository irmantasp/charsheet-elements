<?php

namespace App\Provider;

use App\Helper\SerializerHelperTrait;
use App\Model\Index\IndexModel;
use JMS\Serializer\SerializerInterface;

class ContentDirectoryProvider
{
    use SerializerHelperTrait;

    private SerializerInterface $serializer;

    private string $indexDirectory;

    public function __construct(SerializerInterface $serializer, string $indexDirectory)
    {
        $this->serializer = $serializer;
        $this->indexDirectory = $indexDirectory;
    }

    final public function get(string $path): ?IndexModel
    {
        if (!file_exists($path)) {
            return null;
        }

        return $this->deserialize(file_get_contents($path), IndexModel::class, 'xml');
    }

    final public function persist(string $url, ?string $baseUrl = null): string
    {
        $info = new \SplFileInfo($url);

        $content = file_get_contents($info->getPathname());
        if (empty($content)) {
            throw new \RuntimeException();
        }

        if ($baseUrl === null) {
            $filePath = sprintf('%s/%s', $this->indexDirectory, $info->getFilename());
            $filePath = new \SplFileInfo($filePath);

            if (!is_dir($filePath->getPath()) && !mkdir($filePath->getPath(), 0755, true) && !is_dir($filePath->getPath())) {
                throw new \RuntimeException();
            }

            $result = file_put_contents($filePath->getPathname(), $content);
            if ($result === false) {
                throw new \RuntimeException();
            }

            $baseUrl = $info->getPath();
        }
        else {
            $fileDir = str_replace(sprintf('%s/', $baseUrl), '', $info->getPath());
            $filePath = sprintf('%s/%s/%s', $this->indexDirectory, $fileDir, $info->getFilename());
            $filePath = new \SplFileInfo($filePath);

            if (!is_dir($filePath->getPath()) && !mkdir($filePath->getPath(), 0755, true) && !is_dir($filePath->getPath())) {
                throw new \RuntimeException();
            }

            $result = file_put_contents($filePath->getPathname(), $content);
            if ($result === false) {
                throw new \RuntimeException();
            }
        }

        if ($info->getExtension() === 'index') {
            /** @var IndexModel $indexModel */
            $indexModel = $this->deserialize($content, IndexModel::class, 'xml');
            $indexModelFilesModel = $indexModel->getFiles();
            foreach ($indexModelFilesModel->getFiles() as $file) {
                $this->persist($file->getUrl(), $baseUrl);
            }

            foreach ($indexModelFilesModel->getObsolete() as $obsoleteFile) {
                $this->delete($obsoleteFile->getUrl(), $baseUrl);
            }
        }

        return $filePath->getPathname();
    }

    final public function delete(string $url, ?string $baseUrl = null): void
    {
        $info = new \SplFileInfo($url);

        if ($baseUrl === null) {
            $filePath = sprintf('%s/%s', $this->indexDirectory, $info->getFilename());
            $filePath = new \SplFileInfo($filePath);

            $baseUrl = $info->getPath();
        }
        else {
            $fileDir = str_replace(sprintf('%s/', $baseUrl), '', $info->getPath());
            $filePath = sprintf('%s/%s/%s', $this->indexDirectory, $fileDir, $info->getFilename());
            $filePath = new \SplFileInfo($filePath);
        }

        if (is_file($filePath->getPathname()) === false) {
            return;
        }

        if ($info->getExtension() === 'index') {
            $content = file_get_contents($filePath->getPathname());
            if (empty($content) === false) {
                /** @var IndexModel $indexModel */
                $indexModel = $this->deserialize($content, IndexModel::class, 'xml');
                $indexModelFilesModel = $indexModel->getFiles();

                foreach ($indexModelFilesModel->getObsolete() as $obsoleteFile) {
                    $this->delete($obsoleteFile->getUrl(), $baseUrl);
                }
            }
        }

        unlink($filePath->getPathname());
        if (is_readable($filePath->getPath()) && count(scandir($filePath->getPath())) === 2) {
            rmdir($filePath->getPath());
        }
    }

    final public function purge(string $path): bool
    {
        if (!file_exists($path)) {
            return true;
        }
        if (!is_dir($path)) {
            return unlink($path);
        }

        $list = new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS);
        foreach ($list as $entry) {
            if (!$this->purge($entry)) {
                return false;
            }
        }

        return rmdir($path);
    }

}