<?php

namespace App\Controller\Debug;

use App\Controller\AbstractSerializerController;
use App\Model\Source\IndexModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractSerializerController
{

    final public function list(): Response
    {
        $files = $this->getFiles('index', 'index');
        $sources = $this->getContent($files, IndexModel::class, 'xml');

        return $this->renderPlaceholder($sources);
    }
}