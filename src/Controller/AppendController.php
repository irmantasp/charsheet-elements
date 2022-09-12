<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppendController extends AbstractSerializerController
{

    /**
     * @Route("/append", name="append_list")
     */
    final public function list(): Response {
        $this->setWorkingDir('index');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('xml'));
        /** @var IndexType[] $indexes */
        $indexes = array_map(function ($content) {
            return $this->deserialize($content, \stdClass::class, 'xml');
        }, $files);

        return $this->renderPlaceholder($indexes);
    }
}