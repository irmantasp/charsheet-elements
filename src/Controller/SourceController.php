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
        $this->setWorkingDir('index');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('xml'));
        /** @var IndexModel[] $sources */
        $sources = array_map(function ($content) {
            return $this->deserialize($content, IndexModel::class, 'xml');
        }, $files);

        return $this->renderPlaceholder($sources);
    }
}