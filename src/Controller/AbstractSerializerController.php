<?php

namespace App\Controller;

use App\Helper\FileProviderTrait;
use App\Helper\SerializerHelperTrait;
use App\Property\FileInterface;
use App\Provider\FileProvider;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractSerializerController extends AbstractController
{
    use FileProviderTrait;
    use SerializerHelperTrait;

    public FileProvider $fileProvider;
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer, FileProvider $fileProvider)
    {
        $this->serializer = $serializer;
        $this->fileProvider = $fileProvider;
    }

    final public function renderPlaceholder(mixed $var, ...$vars): Response
    {
        $dumpArguments = (bool) getenv('APP_DUMP_ARGUMENTS');
        if ($dumpArguments === true) {
            /** @noinspection ForgottenDebugOutputInspection */
            dump($var, $vars);
        }

        return $this->render('example/index.html.twig', [
                'controller_name' => static::class . '::' . debug_backtrace()[1]['function']
            ]
        );
    }

    final public function getFiles(string $dir, string $fileExtension): array {
        $this->setWorkingDir($dir);
        return $this->fileProvider->getFilesContentByFile($this->getFilesByExtension($fileExtension));
    }

    final public function getContent(array $files, string $type, string $format): array {
        return array_map(function ($file, $content) use ($type, $format) {
            $object = $this->deserialize($content, $type, $format);
            if ($object instanceof FileInterface) {
                $object->setFilePath($file);
            }

            return $object;
        }, array_keys($files), $files);
    }
}