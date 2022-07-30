<?php

namespace App\Controller;

use App\Model\IndexType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexTypeController extends AbstractSerializerController
{
    /**
     * @Route("/indexes", name="index_type_list")
     */
    final public function list(): Response
    {
        $this->setWorkingDir('index');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('xml'));
        $indexes = array_map(function ($content) {
            return $this->deserialize($content, IndexType::class, 'xml');
        }, $files);

        dump($indexes);

        return $this->render('example/index.html.twig', ['controller_name' => static::class . '::' . debug_backtrace()[0]['function']]);
    }

    final public function listItem(): Response
    {

    }

}