<?php

namespace App\Controller\Session\Character;

use App\Entity\Character;
use App\Form\CharacterForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class CharacterController extends AbstractController
{
    private SessionInterface $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getSession();
    }

    #[Route('/character/list', name: 'character.list')]
    final public function list(Request $request): Response
    {
        $characters = $this->session->get('characters') ?? [];

        return $this->render('character/list.html.twig', ['characters' => $characters]);
    }

    #[Route('/character/add', name: 'character.add')]
    final public function add(Request $request): Response
    {
        $character = new Character();
        $form = $this->createForm(CharacterForm::class, $character, ['operation' => 'add']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getClickedButton() === $form->get('submit')) {
                $character->setUuid((Uuid::v6())::generate());
                $characters = $this->session->get('characters');
                $characters[$character->getUuid()] = $character;
                $this->session->set('characters', $characters);
            }

            return $this->redirectToRoute('character.list');
        }

        return $this->renderForm('character.html.twig', ['form' => $form]);
    }

    #[Route('/character/{character}/edit', name: 'character.edit')]
    #[ParamConverter('character')]
    final public function edit(Character $character, Request $request): Response
    {
        $form = $this->createForm(CharacterForm::class, $character, ['operation' => 'edit']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getClickedButton() === $form->get('submit')) {
                $characters = $this->session->get('characters');
                $characters[$character->getUuid()] = $character;
                $this->session->set('characters', $characters);
            }

            return $this->redirectToRoute('character.list');
        }

        return $this->renderForm('character.html.twig', ['form' => $form]);
    }

    #[Route('/character/{character}/delete', name: 'character.delete')]
    #[ParamConverter('character')]
    final public function delete(Character $character, Request $request): Response
    {
        $form = $this->createForm(CharacterForm::class, $character, ['operation' => 'delete']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getClickedButton() === $form->get('submit')) {
                $characters = $this->session->get('characters');
                unset($characters[$character->getUuid()]);
                $this->session->set('characters', $characters);
            }

            return $this->redirectToRoute('character.list');
        }

        return $this->renderForm('character/form.html.twig', ['form' => $form]);
    }

    #[Route('/character/{character}', name: 'character.view')]
    #[ParamConverter('character')]
    final public function view(Character $character, Request $request): Response
    {
        return new Response();
    }
}