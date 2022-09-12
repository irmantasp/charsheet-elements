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
        $files = $this->getFiles('characters', 'dnd5e');
        $characters = $this->getContent($files, \stdClass::class, 'xml');

        return $this->renderPlaceholder($characters);
    }
}