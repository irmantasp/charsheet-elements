<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractSerializerController
{
    /**
     * @Route("/characters", name="characters_list")
     */
    final public function list(): Response {
        $this->setWorkingDir('characters');
        $files = $this->fileProvider->getFilesContent($this->getFilesByExtension('dnd5e'));
        $characters = array_map(function ($content) {
            return $this->deserialize($content, \stdClass::class, 'xml');
        }, $files);

        return $this->render('example/index.html.twig', ['controller_name' => static::class . '::' . debug_backtrace()[0]['function']]);
    }
}