<?php

namespace App\Provider;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use Symfony\Component\HttpKernel\KernelInterface;

class FileProvider
{

    private KernelInterface $kernel;

    private ?string $workingDir;

    private ?RecursiveIteratorIterator $workingDirIterator;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function setWorkingDir(?string $dir = null): FileProvider
    {
        $projectDir = $this->kernel->getProjectDir();
        $filesDir = implode('/', [$projectDir, 'var']);
        $this->workingDir = implode('/', [$filesDir, $dir]);

        return $this->setWorkingDirIterator();
    }

    private function setWorkingDirIterator(): FileProvider
    {
        $workingDir = new RecursiveDirectoryIterator($this->workingDir);
        $iterator = new RecursiveIteratorIterator($workingDir);
        $this->workingDirIterator = $iterator;

        return $this;
    }

    final public function getFilesByExtension(string $fileExtension): array
    {
        $data = new RegexIterator($this->workingDirIterator, '/^.+\.' . $fileExtension . '$/i', RegexIterator::GET_MATCH);
        $files = [];
        foreach ($data as $filePath) {
            $files[] = reset($filePath);
        }

        return $files;
    }

    final public function getFileContent(string $filePath): ?string
    {
        return file_get_contents($filePath);
    }

    final public function getFilesContent(array $filePaths): array
    {
        $content = array_map(function ($filePath) {
            return $this->getFileContent($filePath);
        }, $filePaths);

        return $content;
    }

    final public function getFilesContentByFile(array $filePaths): array
    {
        $content = [];
        foreach ($filePaths as $filePath) {
            $content[$filePath] = $this->getFileContent($filePath);
        }

        return $content;
    }
}