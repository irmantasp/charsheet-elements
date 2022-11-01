<?php

namespace App\Controller\Session\Character;

use App\Entity\Character;
use App\Form\Character\CharacterStep;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CharacterController extends AbstractController
{

    #[Route('/character/add')]
    final public function add(Request $request): Response
    {
        /** @var SessionInterface $session */
        $session = $request->get('session');

        $character = new Character();
        $form = $this->createForm(CharacterStep::class, $character);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $character = $form->getData();
            $session->set($character->getName(), $character);
//            return $this->redirectToRoute();
        }

        return $this->renderForm('character.html.twig', ['form' => $form]);
    }
}