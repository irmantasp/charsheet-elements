<?php

namespace App\Controller;

use App\Model\IndexType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElementController extends AbstractSerializerController
{

    /**
     * @Route("/elements", name="elements_list")
     */
    final public function list(): Response {
        $this->setWorkingDir('index');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('xml'));
        /** @var IndexType[] $indexes */
        $indexes = array_map(function ($content) {
            return $this->deserialize($content, IndexType::class, 'xml');
        }, $files);

        $elements = [];
        foreach ($indexes as $index) {
            /** @var IndexType $index */
            foreach ($index->elements as $element) {
                $id = $element->id;
/*
                if (isset($elements[$id])) {
                    dump([$elements[$id], $element]);
                    throw new \RuntimeException(sprintf('Duplicate entry already exists for %s', $id));
                }
                $element->indexType = $index;
 */
                $elements[$id] = $element;
            }
        }

        dump($elements);

        return $this->render('example/index.html.twig', ['controller_name' => static::class . '::' . debug_backtrace()[0]['function']]);
    }
}