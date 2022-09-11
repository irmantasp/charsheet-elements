<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractSerializerController
{
    /**
     * @Route("/indexes", name="index_list")
     */
    final public function list(): Response
    {
        $this->setWorkingDir('index');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('index'));
        $indexes = array_map(function ($content) {
            return $this->deserialize($content, \stdClass::class, 'xml');
        }, $files);

        return $this->renderPlaceholder();
    }

}