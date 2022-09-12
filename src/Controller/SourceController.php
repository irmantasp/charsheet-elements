<?php

namespace App\Controller;

use App\Model\Source\IndexModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractSerializerController
{

    /**
     * @Route("/sources", name="source_list")
     */
    final public function list(): Response
    {
        $files = $this->getFiles('index', 'index');
        $sources = $this->getContent($files, IndexModel::class, 'xml');

        return $this->renderPlaceholder($sources);
    }
}