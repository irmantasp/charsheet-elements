<?php

namespace App\Controller\Session\Character;

use App\Entity\Character;
use App\Form\Character\AbilitiesStep;
use App\Form\Character\AbilitySelectionMethodStep;
use App\Form\Character\BackgroundStep;
use App\Form\Character\ClassStep;
use App\Form\Character\RaceStep;
use App\Form\CharacterForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class CharacterController extends AbstractController
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    private function session(): SessionInterface
    {
        return $this->requestStack->getSession();
    }

    #[Route('/character/list', name: 'character.list')]
    final public function list(Request $request): Response
    {
        $characters = $this->session()->get('characters') ?? [];

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
                $characters = $this->session()->get('characters');
                $characters[$character->getUuid()] = $character;
                $this->session()->set('characters', $characters);
            }

            return $this->redirectToRoute('character.list');
        }

        return $this->render('character/form.html.twig', ['form' => $form]);
    }

    #[Route('/character/{character}/edit', name: 'character.edit')]
    final public function edit(Character $character, Request $request): Response
    {
        $form = $this->createForm(CharacterForm::class, $character, ['operation' => 'edit']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getClickedButton() === $form->get('submit')) {
                $characters = $this->session()->get('characters');
                $characters[$character->getUuid()] = $character;
                $this->session()->set('characters', $characters);
            }

            return $this->redirectToRoute('character.list');
        }

        return $this->render('character/form.html.twig', ['form' => $form]);
    }

    #[Route(
        '/character/{character}/build/{step}',
        name: 'character.build',
        requirements: [
            'step' => 'ability_selection|ability|race|class|background'
        ],
        defaults: [
            'step' => 'ability_selection'
        ]
    )]
    final public function build(Character $character, string $step, Request $request): Response
    {
        switch ($step) {
            default:
            case 'ability_selection':
                $previousStep = null;
                $stepForm = AbilitySelectionMethodStep::class;
                $nextStep = 'ability';
                break;
            case 'ability':
                $previousStep = 'ability_selection';
                $stepForm = AbilitiesStep::class;
                $nextStep = 'race';
                break;
            case 'race':
                $previousStep = null;
                $stepForm = RaceStep::class;
                $nextStep = 'class';
                break;
            case 'class':
                $previousStep = 'race';
                $stepForm = ClassStep::class;
                $nextStep = 'background';
                break;
            case 'background':
                $previousStep = 'class';
                $stepForm = BackgroundStep::class;
                $nextStep = null;
                break;
        }

        $form = $this->createForm($stepForm, $character);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getClickedButton() === $form->get('next')) {
                $characters = $this->session()->get('characters');
                $characters[$character->getUuid()] = $character;
                $this->session()->set('characters', $characters);
                $redirectStep = $nextStep;
            }
            else {
                $redirectStep = $previousStep;
            }

            if (!is_null($redirectStep)) {
                return $this->redirectToRoute('character.build', ['character' => $character->getUuid(), 'step' => $redirectStep]);
            }
        }

        return $this->render('character/steps/form.html.twig', ['form' => $form]);
    }

    #[Route('/character/{character}/delete', name: 'character.delete')]
    final public function delete(Character $character, Request $request): Response
    {
        $form = $this->createForm(CharacterForm::class, $character, ['operation' => 'delete']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getClickedButton() === $form->get('submit')) {
                $characters = $this->session()->get('characters');
                unset($characters[$character->getUuid()]);
                $this->session()->set('characters', $characters);
            }

            return $this->redirectToRoute('character.list');
        }

        return $this->render('character/form.html.twig', ['form' => $form]);
    }

    #[Route('/character/{character}', name: 'character.view')]
    final public function view(Character $character, Request $request): Response
    {
        return new Response();
    }
}