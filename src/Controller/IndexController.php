<?php

namespace App\Controller;

use App\Model\Index\ElementsModel;
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
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('xml'));
        $indexes = array_map(function ($content) {
            return $this->deserialize($content, ElementsModel::class, 'xml');
        }, $files);

        $info = $elements = $appends = [];
        foreach ($indexes as $index) {
            if (isset($index->info)) {
                $info[] = $index->info;
            }
            if (!empty($index->elements)) {
                array_push($elements, ...$index->elements);
            }

            if (!empty($index->append)) {
                array_push($appends, ...$index->append);
            }
        }

        return $this->renderPlaceholder($indexes);
    }

}