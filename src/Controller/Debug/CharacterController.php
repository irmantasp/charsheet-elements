<?php

namespace App\Controller\Debug;

use App\Controller\AbstractSerializerController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractSerializerController
{
    /**
     * @Route("/debug/characters", name="debug_characters_list")
     */
    final public function list(): Response {
        $files = $this->getFiles('characters', 'dnd5e');
        $characters = $this->getContent($files, \stdClass::class, 'xml');

        return $this->renderPlaceholder($characters);
    }
}